function doGet(){
  return HtmlService.createHtmlOutputFromFile("upload.html")
    .addMetaTag('viewport', 'width=device-width, initial-scale=1')
    .setTitle('GAS Upload File - Tugas Enteng')
}

function upload(e){
  var destination_id = "1_Kx4Hk2nSm1e6HjiUt0fAdRwq1AySmPk"; //folderID
  var img = e.imageFile;
  var nama = e.nama;
  var contentType = "image/jpeg";
  var destination = DriveApp.getFolderById(destination_id);
  var img = img.getAs(contentType);
  img.setName(nama);
  destination.createFile(img);
}