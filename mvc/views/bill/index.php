{{ include('layouts/header.php', {title:'Bills'})}}
    <h1>Bills</h1>
    <table>
        <thead>
            <tr>
                <th class="bill">Bill number</th>
                <th>Car</th>
                <th>Total</th>

            </tr>
        </thead>
        <tbody>
          {% for bill in bills %}
            <tr>
                <td><a href="{{base}}/bill/show?id={{bill.bill_number}}" class="billnumber"># {{ bill.bill_number }}</td>
                <td>
                    {% if bill.serial_number ==  "1HGBH41JXMN109186" %}
                        <a href="{{base}}/automobile/show?serial_number={{ bill.serial_number }}">Toyota Camry</a>
                    {% elseif bill.serial_number == "1HGCM82633A123456" %}
                        <a href="{{base}}/automobile/show?serial_number={{ bill.serial_number }}">Ford Mustang</a>
                    {% elseif bill.serial_number == "2HGFA16508H123456" %}
                        <a href="{{base}}/automobile/show?serial_number={{ bill.serial_number }}">Honda Civic</a>
                    {% elseif bill.serial_number == "VF1RFA00663412345" %}
                        <a href="{{base}}/automobile/show?serial_number={{ bill.serial_number }}">Renault Clio</a>
                    {% elseif bill.serial_number == "WBA3A5C50DF123456" %}
                        <a href="{{base}}/automobile/show?serial_number={{ bill.serial_number }}">BMW 3 Series</a>
                    {% else %}
                        woy
                    {% endif%}
                </td>
                <td class="money">{{ bill.total }} $</td>
            </tr>
          {% endfor %}
        </tbody>
    </table>
    <div class="buttons">
        <a href="{{base}}/client" class="btn back">Back</a>
        <a href="{{base}}/bill/create" class="btn">New Bill</a>
    </div>
{{ include('layouts/footer.php')}}