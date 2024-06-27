<table>
    <thead>
        <tr>
            <th>Estados</th>
            <th>0</th>
            <th>1</th>
            <th>Z</th>
            <th>B</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td>q0</td>
            <td <?php if ($_SESSION["seleccion"][0] == 0 && $_SESSION["seleccion"][1] == "0") { echo 'style="background-color:red;"'; } ?>>(q0, 0, R)</td>
            <td <?php if ($_SESSION["seleccion"][0] == 0 && $_SESSION["seleccion"][1] == "1") { echo 'style="background-color:red;"'; } ?>>(q1, 1, R)</td>
            <td></td>
            <td></td>
        </tr>
        <tr>
            <td>q1</td>
            <td <?php if ($_SESSION["seleccion"][0] == 1 && $_SESSION["seleccion"][1] == "0") { echo 'style="background-color:red;"'; } ?>>(q2, 1, L)</td>
            <td <?php if ($_SESSION["seleccion"][0] == 1 && $_SESSION["seleccion"][1] == "1") { echo 'style="background-color:red;"'; } ?>>(q1, 1, R)</td>
            <td></td>
            <td <?php if ($_SESSION["seleccion"][0] == 1 && $_SESSION["seleccion"][1] == "B") { echo 'style="background-color:red;"'; } ?>>(q4, B, L)</td>
        </tr>
        <tr>
            <td>q2</td>
            <td <?php if ($_SESSION["seleccion"][0] == 2 && $_SESSION["seleccion"][1] == "0") { echo 'style="background-color:red;"'; } ?>>(q2, 0, L)</td>
            <td <?php if ($_SESSION["seleccion"][0] == 2 && $_SESSION["seleccion"][1] == "1") { echo 'style="background-color:red;"'; } ?>>(q2, 1, L)</td>
            <td <?php if ($_SESSION["seleccion"][0] == 2 && $_SESSION["seleccion"][1] == "Z") { echo 'style="background-color:red;"'; } ?>>(q2, Z, L)</td>
            <td <?php if ($_SESSION["seleccion"][0] == 2 && $_SESSION["seleccion"][1] == "B") { echo 'style="background-color:red;"'; } ?>>(q3, B, R)</td>
        </tr>
        <tr>
            <td>q3</td>
            <td <?php if ($_SESSION["seleccion"][0] == 3 && $_SESSION["seleccion"][1] == "0") { echo 'style="background-color:red;"'; } ?>>(q0, B, R)</td>
            <td <?php if ($_SESSION["seleccion"][0] == 3 && $_SESSION["seleccion"][1] == "1") { echo 'style="background-color:red;"'; } ?>>(q0, Z, R)</td>
            <td <?php if ($_SESSION["seleccion"][0] == 3 && $_SESSION["seleccion"][1] == "Z") { echo 'style="background-color:red;"'; } ?>>(q3, Z, R)</td>
            <td></td>
        </tr>
        <tr>
            <td>q4</td>
            <td <?php if ($_SESSION["seleccion"][0] == 4 && $_SESSION["seleccion"][1] == "0") { echo 'style="background-color:red;"'; } ?>>(q5, 0, R)</td>
            <td <?php if ($_SESSION["seleccion"][0] == 4 && $_SESSION["seleccion"][1] == "1") { echo 'style="background-color:red;"'; } ?>>(q4, B, L)</td>
            <td <?php if ($_SESSION["seleccion"][0] == 4 && $_SESSION["seleccion"][1] == "Z") { echo 'style="background-color:red;"'; } ?>>(q5, Z, R)</td>
            <td></td>
        </tr>
        <tr>
            <td>q5</td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
        </tr>
    </tbody>
</table>
