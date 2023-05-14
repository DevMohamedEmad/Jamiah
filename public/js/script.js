let plus = document.getElementById("plus");
let parent = document.getElementById("inputs");

plus.addEventListener("click", function (e) {
    e.preventDefault();
    console.log(e)
    let trElement = document.createElement("tr");
    trElement.setAttribute("class", "text-center");
    trElement.innerHTML = `<td scope="row" >  </td>
<td>
    <input type="text" class="form-control" id="inputAddress" placeholder="اسم المرفق" name="attachment_name[]">
</td>
<td>
    <input type="file" class="form-control" id="inputAddress" placeholder="" name="file[]">
</td>`
    parent.appendChild(trElement);
})


function add_input_file() {
    document.getElementById('input_file').innerHTML += `<input type="file" class="form-control" id="inputAddress" value="{{ $attachment->file }}" name="file[]">`;
}

