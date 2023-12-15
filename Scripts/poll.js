let optionCount = 2;
function addOption() {
    let div = document.createElement('div');
    div.className = 'option';
    let input = document.createElement('input');
    input.type = 'text';
    input.name = 'options[]';
    input.placeholder = 'Option ' + ++optionCount;
    let remove = document.createElement('button');
    remove.innerHTML = 'X';
    remove.className = 'remove';
    remove.onclick = function() {
        div.parentNode.removeChild(div);
        optionCount--;
        if (optionCount < 9) {
            document.getElementById('add').disabled = false;
            document.getElementById('add').style.backgroundColor = 'rgba(45,0,255,0.73)';
            document.getElementById('add').style.color = '#fff';
        }
    }
    div.appendChild(input);
    div.appendChild(remove);
    document.getElementById('options').appendChild(div);
    if (optionCount >= 9) {
        document.getElementById('add').disabled = true;
        document.getElementById('add').style.backgroundColor = '#ccc';
        document.getElementById('add').style.color = '#666';
    }
}