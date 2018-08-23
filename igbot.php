$access_token="1499419437.09aa1fd.0d00670bb5f8428d9e05ae9a3fd747af";
$photo_count=10; // จำนวนรูปภาพที่ต้องการดึงมาแสดง
     
$json_url="https://api.instagram.com/v1/users/self/media/recent/?";
$json_url.="access_token={$access_token}&count={$photo_count}";
 
$json_data = file_get_contents($json_url);
$obj = json_decode($json_data, true, 512, JSON_BIGINT_AS_STRING); // PHP 5.4 ขึ้นไป
 
 
foreach ($obj['data'] as $post) {
     
    echo $post['caption']['text'];
 
    echo $post['link'];
 
    echo str_replace("http://", "https://", $post['images']['low_resolution']['url']); // url ของรูปภาพขนาดเล็กสุด
 
   // ภาพมี 3 ขนาดคือ low_resolution, standard_resolution, thumbnail, 
 
     
    // ดู key,value ทั้งหมดจาก json นะครับ
    // https://api.instagram.com/v1/users/self/media/recent/?access_token=1499419437.09aa1fd.0d00670bb5f8428d9e05ae9a3fd747af&count=1
}
