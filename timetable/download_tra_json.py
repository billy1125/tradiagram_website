import urllib.request
import zipfile
import time
import datetime
import os
import sys

argv_date = sys.argv[1]

def download_tra_json(str_date):

    strUrl = 'http://163.29.3.98/json/'
    strFileExtent = '.zip'
    strdate = str_date

    strFullUrl = strUrl + strdate + strFileExtent #完整網址
    strZipFile = str_date + strFileExtent #檔案名稱

    strLog =''
    
    try:
        #strLog += '下載XML\n'
        urllib.request.urlretrieve(strFullUrl, strZipFile)

        if os.path.exists(strZipFile):
            strLog += '下載成功' + '\n'
        else:
            strLog += '下載失敗' + '\n'


       # strLog += '解壓縮XML\n'
        zip_ref = zipfile.ZipFile(strZipFile, 'r')
        zip_ref.extractall()
        zip_ref.close()




        if os.path.exists(strZipFile):
            strLog += '已刪除' + strZipFile + '\n'
            os.remove(strZipFile)
        else:
            strLog += '沒有' + strZipFile + '\n'

            
    except OSError as err:
        strLog += "OS error: {0}".format(err) + '\n'
    except ValueError:
        strLog += "Could not convert data to an integer." + '\n'
    except:
        strLog += "Unexpected error:", sys.exc_info()[0] + '\n'

    finally:
        f = open('log.txt', 'w')
        f.write(strLog)
        f.close()

if not os.path.exists(argv_date + '.json'):
    download_tra_json(argv_date)


