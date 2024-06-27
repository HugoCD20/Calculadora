<table>
    <thead>
        <tr>
            <th>Estados</th>
            <th>0</th>
            <th>1</th>
            <th>B</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td>q0</td>
            <td <?php if ($_SESSION["seleccion"][0] == 0 && $_SESSION["seleccion"][1] == "0") { echo 'style="background-color:red;"'; } ?>>(q1, B, R)</td>
            <td <?php if ($_SESSION["seleccion"][0] == 0 && $_SESSION["seleccion"][1] == "1") { echo 'style="background-color:red;"'; } ?>>(q3, B, R)</td>
            <td></td>
        </tr>
        <tr>
            <td>q1</td>
            <td <?php if ($_SESSION["seleccion"][0] == 1 && $_SESSION["seleccion"][1] == "0") { echo 'style="background-color:red;"'; } ?>>(q1, 0, R)</td>
            <td <?php if ($_SESSION["seleccion"][0] == 1 && $_SESSION["seleccion"][1] == "1") { echo 'style="background-color:red;"'; } ?>>(q1, 1, R)</td>
            <td <?php if ($_SESSION["seleccion"][0] == 1 && $_SESSION["seleccion"][1] == "B") { echo 'style="background-color:red;"'; } ?>>(q2, 0, L)</td>
        </tr>
        <tr>
            <td>q2</td>
            <td <?php if ($_SESSION["seleccion"][0] == 2 && $_SESSION["seleccion"][1] == "0") { echo 'style="background-color:red;"'; } ?>>(q2, 0, L)</td>
            <td <?php if ($_SESSION["seleccion"][0] == 2 && $_SESSION["seleccion"][1] == "1") { echo 'style="background-color:red;"'; } ?>>(q2, 1, L)</td>
            <td <?php if ($_SESSION["seleccion"][0] == 2 && $_SESSION["seleccion"][1] == "B") { echo 'style="background-color:red;"'; } ?>>(q0, B, R)</td>
        </tr>
        <tr>
            <td>q3</td>
            <td <?php if ($_SESSION["seleccion"][0] == 3 && $_SESSION["seleccion"][1] == "0") { echo 'style="background-color:red;"'; } ?>>(q4, B, R)</td>
            <td <?php if ($_SESSION["seleccion"][0] == 3 && $_SESSION["seleccion"][1] == "1") { echo 'style="background-color:red;"'; } ?>>(q6, B, R)</td>
            <td></td>
        </tr>
        <tr>
            <td>q4</td>
            <td <?php if ($_SESSION["seleccion"][0] == 4 && $_SESSION["seleccion"][1] == "0") { echo 'style="background-color:red;"'; } ?>>(q4, 0, R)</td>
            <td <?php if ($_SESSION["seleccion"][0] == 4 && $_SESSION["seleccion"][1] == "1") { echo 'style="background-color:red;"'; } ?>>(q4, 1, R)</td>
            <td <?php if ($_SESSION["seleccion"][0] == 4 && $_SESSION["seleccion"][1] == "B") { echo 'style="background-color:red;"'; } ?>>(q5, 0, L)</td>
        </tr>
        <tr>
            <td>q5</td>
            <td <?php if ($_SESSION["seleccion"][0] == 5 && $_SESSION["seleccion"][1] == "0") { echo 'style="background-color:red;"'; } ?>>(q5, 0, L)</td>
            <td <?php if ($_SESSION["seleccion"][0] == 5 && $_SESSION["seleccion"][1] == "1") { echo 'style="background-color:red;"'; } ?>>(q5, 1, L)</td>
            <td <?php if ($_SESSION["seleccion"][0] == 5 && $_SESSION["seleccion"][1] == "B") { echo 'style="background-color:red;"'; } ?>>(q3, B, R)</td>
        </tr>
    </tbody>
</table>
