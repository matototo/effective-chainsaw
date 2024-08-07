{{ include('layouts/header.php', {title:'Show Bill'})}}
    <div class="container">
        <h3>Bill number {{ bill.id }}</h3>
        <div class="show">
        <p><strong>Client : </strong>
            <a href="{{base}}/client/show?id=1">{{ client.name }}</a></p>
       
        <p><strong>Car : </strong>
            <a href="{{base}}/automobile/show?serial_number={{bill.serial_number}}">{{ car.name }}</a></p>
        <p><strong>Quantity : </strong>
            {{ bill.qt }} item(s)</p>
        <p><strong>Bill total : </strong>
            {{ bill.total }} $</p>
        <p><strong>Date : </strong>{{ bill.bill_date }}</p>
        </div>

        <!--
        <div class="buttons">
            <form action="{{base}}/bill/delete" method="post">
                <input type="hidden" name="id" value="{{ bill.id }}">
                <button class="btn red">Delete</button>
            </form>
        </div>
        -->  

    </div>
{{ include('layouts/footer.php')}}

