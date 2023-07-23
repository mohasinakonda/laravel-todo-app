<form id="statusForm" action="{{ route('get-status') }}" method="post">
@csrf
    <input type="radio" name="status" value="active" {{ $status === 'active' ? 'checked' : '' }}> Active
    <input type="radio" name="status" value="not-active" {{ $status === 'not-active' ? 'checked' : '' }}> Not Active
    
</form>
<h2 id="statusDisplay">{{ $status }}</h2>

<form id="activeForm" style="display: none;">
    <input type="text" name="name" placeholder="Enter your name">
    <input type="email" name="email" placeholder="Enter your email">
    <input type="password" name="password" placeholder="Enter your password">
    <button type="submit">Submit</button>
</form>

<form id="notActiveForm" style="display: none;">
    <input type="email" name="email" placeholder="Reset your password">
    <button type="submit">Submit</button>
</form>

<script>
    document.addEventListener("DOMContentLoaded", function() {
        var statusForm = document.getElementById("statusForm");
        var activeForm = document.getElementById("activeForm");
        var notActiveForm = document.getElementById("notActiveForm");
        var statusDisplay = document.getElementById("statusDisplay");

        statusForm.addEventListener("submit", function(event) {
            event.preventDefault();

            var selectedStatus = document.querySelector('input[name="status"]:checked').value;

            if (selectedStatus === 'active') {
                activeForm.style.display = "block";
                notActiveForm.style.display = "none";
            } else {
                activeForm.style.display = "none";
                notActiveForm.style.display = "block";
            }

            statusDisplay.innerText = selectedStatus;
        });
    });
</script>