#基本時刻表查詢

import json
import sys

argv_start_station = sys.argv[1]
argv_end_station = sys.argv[2]
argv_date = sys.argv[3]
argv_time = sys.argv[4]
argv_carclass = sys.argv[5]

with open(argv_date + '.json', 'r', encoding='utf8') as data_file:    
    data = json.load(data_file)

dict_car_select = {
    'local': ['1131', '1132'],
    'tzu_chiang': ['1100', '1101', '1102', '1103', '1107', '1108'],
    'chu_kuang': ['1110', '1111', '1114', '1115'],
    'puyuma_taroko': ['1102', '1107'],
    'puxing_ordinary': ['1120', '1140'],
    'seat': ['1100', '1101', '1102', '1103', '1107', '1108', '1110', '1111', '1114', '1115', '1102', '1107'],
    'noseat': ['1131', '1132', '1120', '1140'],
    'all': ['1131', '1132', '1100', '1101', '1102', '1103', '1107', '1108', '1110', '1111', '1114', '1115', '1120', '1140']
    }

dict_car_kind = {
    '1131': '區間車',
    '1132': '區間車',
    '1100': '自強號',
    '1101': '自強號',
    '1102': '自強號',
    '1103': '自強號',
    '1107': '自強號',
    '1108': '自強號',
    '1110': '莒光號',
    '1111': '莒光號',
    '1114': '莒光號',
    '1115': '莒光號',
    '1102': '普悠瑪',
    '1107': '太魯閣',
    '1120': '復興號',
    '1140': '普快車'
    }

def find_trains(start_station, end_station, start_time, car_class):

    stations = []

    list_car_class = dict_car_select.get(car_class)

    for x in data['TrainInfos']: #逐車次搜尋

        station_info = [] #經過車站
        have_start_end = False #確定該車次有終站才列入
        start_station_order = -1 #起站順序
        end_station_order = -1 #終站順序
        start_station_time = '' #起站出發時間
        end_station_time = '' #終站到站時間
        
        
        if x['CarClass'] in list_car_class: #若有限定特定車種
            for y in x['TimeInfos']: #基本邏輯：先找尋起站，若有，將起站順序列入，再找尋終站，若有，將終站順序列入
                if y['Station'] == start_station:
                    list_start_station_time = y['DepTime'].split(':') #擷取起站出發時間
                    start_station_time = list_start_station_time[0] + list_start_station_time[1]
                    if start_station_time >= start_time: #出發時間需大於查詢的時間
                        start_station_order = int(y['Order'])
                        start_station_time = y['DepTime']
                elif y['Station'] == end_station:
                    end_station_order = int(y['Order'])
                    end_station_time = y['ArrTime']

            #比較起終站順序，若確認終站順序大於起站，並且起終站都有順序，則確認該車次為可搭乘的車次
            if start_station_order < end_station_order and start_station_order != -1 and end_station_order != -1:
                have_start_end = True
            
            if have_start_end == True:
                station_info.append(x['Train']) #車次
                station_info.append(dict_car_kind.get(x['CarClass'])) #車種
                station_info.append(start_station_time) #開車時間
                station_info.append(end_station_time) #到站時間
                station_info.append(x['Note']) #備註
                stations.append(station_info)

    #sorted(stations, key = lambda x : x[2].replace(':', ''))
    #stations.sort()

    json_output = json.dumps(sorted(stations, key = lambda x : x[2]))

    print(json_output)

find_trains(argv_start_station, argv_end_station, argv_time, argv_carclass)
