<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ title }}</title>
    <link rel="stylesheet" href="{{asset}}css/style.css">
</head>
<body>
    <nav>
        <ul>
            <div class="left">
                {% if session.privilege_id == 1 %}
                <li><a href="{{base}}/client">Clients</a></li>
                <li><a href="{{base}}/bill">Bills</a></li>
                {% endif %}
                <li><a href="{{base}}/automobile">Automobiles</a></li>
                <li><a href="{{base}}/manufacturer">Manufacturers</a></li>
            </div>
            <div class="right">
                {% if session.privilege_id == 1 %}
                    <li><a href="{{base}}/user/create">Users</a></li>
                    <li><a href="{{base}}/log">Logbook</a></li>
                {% endif %}
                {% if guest %}
                    <li><a href="{{base}}/forgot">?</a></li>
                    <li><a href="{{base}}/login">Login</a></li>
                {% else %}
                    <li><a href="{{base}}/logout">Logout</a></li>
                {% endif %}
            </div>
        </ul>
    </nav>
    <main>
    {% if guest is empty %}
        <div class="hero"><p>Hello {{ session.name }} ! </p></div>
    {% endif %}