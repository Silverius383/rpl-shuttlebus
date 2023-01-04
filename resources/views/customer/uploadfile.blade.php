<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>PHP File Upload</title>
</head>
<body>
    <style>
      .picker-content{
        height:300px;
        width:200px;
      }
    </style>
    <script src="//static.filestackapi.com/filestack-js/2.x.x/filestack.min.js"></script>
    <script type="text/javascript">
      document.addEventListener("DOMContentLoaded", function(event) { 
        const client = filestack.init('AD7bNP33KS2KtLmnyxHXbz'); 

        let options = {
          onFileUploadFinished(file){
            var url = new URL(file.url);
            var id = document.getElementById("orderId").value

            window.location.href = "/home/booking/" + id + "/upload" + url.pathname;
          },
          onFileSelected: file => {
            if (file.size > 3000*1000){
              throw new Error('Ukuran file terlalu besar')
            }
          },
          "displayMode": "inline",
          "container": ".picker-content",
          "accept": [
            "image/jpeg",
            "image/jpg",
            "image/png"
          ],
          "fromSources": [
            "local_file_system"
          ],
          "uploadInBackground": false,
        };
        client.picker(options).open();
      });
    </script>
    <div class="picker-content">
      <input type="hidden" id="orderId" value="{{$booking->booking_id}}"> 
    </div>
</body>
</html>