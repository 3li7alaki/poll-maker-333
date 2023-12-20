polls = document.getElementsByClassName("poll");

function searchPolls() {
    let search = document.getElementById("search").value;
    for (let poll of polls) {
        if (poll.firstChild.innerHTML.toLowerCase().includes(search.toLowerCase())) {
            poll.style.display = "block";
        } else {
            poll.style.display = "none";
        }
    }
}

function categoryFilter(select) {
    let category = select.value;
    for (let poll of polls) {
        if (!category) {
            poll.style.display = "block";
        } else if (poll.children.item(1).innerHTML === category) {
            poll.style.display = "block";
        } else {
            poll.style.display = "none";
        }
    }
}

function viewPoll(poll) {
    window.location.href = "viewPoll.php?pollId=" + poll.id;
}