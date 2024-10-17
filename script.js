// function setAction(action) {
//     document.getElementById('actionInput').value = action;
//     document.getElementById('encryptBtn').classList.toggle('active', action === 'encrypt');
//     document.getElementById('decryptBtn').classList.toggle('active', action === 'decrypt');
// }

function toggleCipherOptions() {
    var cipherType = document.getElementById('cipherType').value;
    document.getElementById('caesar-options').style.display = cipherType === 'caesar' ? 'block' : 'none';
    document.getElementById('vigenere-options').style.display = cipherType === 'vigenere' ? 'block' : 'none';
}

function setAction(action) {
    document.getElementById('actionInput').value = action;
    document.getElementById('encryptBtn').classList.toggle('active', action === 'encrypt');
    document.getElementById('decryptBtn').classList.toggle('active', action === 'decrypt');
}

document.addEventListener('DOMContentLoaded', function () {
    toggleCipherOptions(); 
});



// Modal
 
var modal = document.getElementById("myModal");
var btn = document.getElementById("addBtn");
var span = document.getElementsByClassName("close")[0];

btn.onclick = function() {
    modal.style.display = "block";
}

// ปิด Modal เมื่อกดปุ่ม x
span.onclick = function() {
    modal.style.display = "none";
}

// ปิด Modal เมื่อคลิกนอก modal
window.onclick = function(event) {
    if (event.target == modal) {
        modal.style.display = "none";
    }
}



    function copyResult() {
        // เลือกข้อความที่ต้องการคัดลอก
        var resultText = document.getElementById("resultText").innerText;

        // สร้าง element ชั่วคราวเพื่อคัดลอก
        var tempInput = document.createElement("textarea");
        tempInput.value = resultText;
        document.body.appendChild(tempInput);

        // เลือกข้อความทั้งหมดแล้วคัดลอก
        tempInput.select();
        tempInput.setSelectionRange(0, 99999); // สำหรับมือถือ
        document.execCommand("copy");

        // ลบ element ชั่วคราวออก
        document.body.removeChild(tempInput);

        // แจ้งเตือนผู้ใช้ว่าคัดลอกสำเร็จ
        alert("Results copied successfully!!");
    }
