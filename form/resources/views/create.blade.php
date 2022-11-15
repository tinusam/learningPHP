<form action="/create" method="POST">
    @csrf
    <label for="title">Title:</label>
    <input type="text" name="title"><br><br>

    <label for="body">Body:</label>
    <textarea name="body" cols="30" rowa="10"></textarea><br><br><br>


    <button>Send</button>
    
</form>