<?php

?>

{{ include('layouts/header.php', {title:'Forgotten password'})}}
    <div class="container">
        {% if errors is defined %}
        <div class="error">
        <ul>
        {% for error in errors %}
            <li>{{ error }}</li>        
        {% endfor %}
        </ul>
        </div>
        {% endif %}
    <form method="post">
        <h2>Enter your info : </h2>
        <label>Email :
            <input type="email" name="username" value="{{ user.username }}">
        </label>
        <input type="submit" class="btn" value="reset">
    </form>
    </div>
{{ include ('layouts/footer.php')}}