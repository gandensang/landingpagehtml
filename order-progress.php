<?php


if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $utm_source = isset($_POST['utm_source']) ? $_POST['utm_source'] : '';
    $utm_medium = isset($_POST['utm_medium']) ? $_POST['utm_medium'] : '';
    $utm_content = isset($_POST['utm_content']) ? $_POST['utm_content'] : '';
    $utm_campaign = isset($_POST['utm_campaign']) ? $_POST['utm_campaign'] : '';
    $utm_term = isset($_POST['utm_term']) ? $_POST['utm_term'] : '';
    $utm_gclid = isset($_POST['utm_gclid']) ? $_POST['utm_gclid'] : '';
    $nama = isset($_POST['nama']) ? $_POST['nama'] : ''; 
    $whatsapp = isset($_POST['whatsapp']) ? $_POST['whatsapp'] : '';
    $landing_page_url = isset($_POST['landing_page_url']) ? $_POST['landing_page_url'] : '';

    // Data untuk dikirim ke API dalam format JSON
    $data = array(
        'Nama' => "(Ratu Jangkrik) " . $nama,
        'Whatsapp' => $whatsapp,
        'UtmSource' => $utm_source,
        'UtmMedium' => $utm_medium,
        'UtmTerm' => $utm_term,
        'UtmCampaign' => $utm_campaign,
        'UtmContent' => $utm_content,
        'Gclid' => $utm_gclid,
        'LandingPageUrl' => $landing_page_url
    );
    
    // Mengubah array data menjadi format JSON
    $jsonData = json_encode($data);

    // Kirim data JSON ke API menggunakan metode POST
    $apiUrl = 'https://suryatracking.azurewebsites.net/api/apiform/form'; // Ganti dengan URL API yang sesuai
    $response = sendPostRequest($apiUrl, $jsonData);

    // Mengambil nomor WhatsApp dari respons API
    //$whatsappNumber = $response['whatsapp_number']; // Ganti dengan key yang sesuai di respons API
    $whatsappNumber = '6285655629262';
    $isiPesan = "Hallo Ratu Jangkrik, Saya $nama, tertarik untuk memesan telur jangkrik DENGAN HARGA PROMO, Apakah harga promo masih tersedia?, Mohon infonya..Terimakasih" ;

    // Redirect ke aplikasi WhatsApp
    header("Location: http://wa.me/" .$whatsappNumber. "?text=".urlencode($isiPesan));
    exit();
}

function sendPostRequest($url, $data) {
    $options = array(
        'http' => array(
            'header'  => "Content-type: application/json\r\n",
            'method'  => 'POST',
            'content' => $data,
        ),
    );

    $context  = stream_context_create($options);
    $result = file_get_contents($url, false, $context);

    if ($result === false) {
        // Handle error
        return false;
    }

    return json_decode($result, true);
}
?>
