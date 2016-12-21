<script>
var a;
var b;
 
// Lấy giá trị từ người dùng
a = prompt("Nhập vào số a", "0");
b = prompt("Nhập vào số b", "0");
 
// Chuyển sang kiểu number
a = parseInt(a);
b = parseInt(b);
 
// Kiểm tra số nào lớn
if (a > b){
    document.write("Số a lớn hơn số b");
}
else if (a < b){
    document.write("Số a bé hơn số b");
}
else{
    document.write("Số a bằng với số b");
}
</script>