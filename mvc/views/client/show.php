{{ include('layouts/header.php', {title:'Show Client'})}}
    <div class="container">
        <h3>Client</h3>
        <div class="show">
            <p><strong>Name : </strong>{{ client.name }}</p>
            <p><strong>Address : </strong>{{ client.address }}</p>
            <p><strong>Phone : </strong>{{ client.phone }}</p>
            <p><strong>Zip Code : </strong>{{ client.zip_code }}</p>
            <p><strong>Email : </strong>{{ client.email }}</p>
            <p><strong>Date of birth : </strong>{{ client.date_of_birth }}</p>
        </div>
        <div class="buttons">
            <a href="{{base}}/client" class="btn back">Back</a>
            <form action="{{base}}/client/delete" method="post">
                <input type="hidden" name="id" value="{{ client.id }}">
                <button class="btn red">Delete</button>
            </form>    
            <a class="btn" href="{{base}}/client/edit?id={{ client.id }}">Edit</a>
        </div>
    </div>
{{ include('layouts/footer.php')}}