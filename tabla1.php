<table>
    <thead>
        <tr>
            <th>Estados</th>
            <th>0</th>
            <th>1</th>
            <th>X</th>
            <th>B</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td>q0</td>
            <td <?php if($_SESSION["seleccion"][0] == 0 && $_SESSION["seleccion"][1] == "0"){ echo 'style="background-color:red;"'; } ?>>(q1,B,R)</td>
            <td></td>
            <td></td>
            <td></td>
        </tr>
        <tr>
            <td>q1</td>
            <td <?php if($_SESSION["seleccion"][0] == 1 && $_SESSION["seleccion"][1] == "0"){ echo 'style="background-color:red;"'; } ?>>(q1,0,R)</td>
            <td <?php if($_SESSION["seleccion"][0] == 1 && $_SESSION["seleccion"][1] == "1"){ echo 'style="background-color:red;"'; } ?>>(q2,1,R)</td>
            <td></td>
            <td></td>
        </tr>
        <tr>
            <td>q2</td>
            <td <?php if($_SESSION["seleccion"][0] == 2 && $_SESSION["seleccion"][1] == "0"){ echo 'style="background-color:red;"'; } ?>>(q3,X,R)</td>
            <td <?php if($_SESSION["seleccion"][0] == 2 && $_SESSION["seleccion"][1] == "1"){ echo 'style="background-color:red;"'; } ?>>(q5,1,L)</td>
            <td></td>
            <td></td>
        </tr>
        <tr>
            <td>q3</td>
            <td <?php if($_SESSION["seleccion"][0] == 3 && $_SESSION["seleccion"][1] == "0"){ echo 'style="background-color:red;"'; }?>>(q3,0,R)</td>
            <td <?php if($_SESSION["seleccion"][0] == 3 && $_SESSION["seleccion"][1] == "1"){ echo 'style="background-color:red;"'; }?>>(q3,1,R)</td>
            <td></td>
            <td <?php if($_SESSION["seleccion"][0] == 3 && $_SESSION["seleccion"][1] == "B"){ echo 'style="background-color:red;"'; }?>>(q4,0,L)</td>
        </tr>
        <tr>
            <td>q4</td>
            <td <?php if($_SESSION["seleccion"][0] == 4 && $_SESSION["seleccion"][1] == "0"){ echo 'style="background-color:red;"'; }?>>(q4,0,L)</td>
            <td <?php if($_SESSION["seleccion"][0] == 4 && $_SESSION["seleccion"][1] == "1"){ echo 'style="background-color:red;"'; }?>>(q2,1,R)</td>
            <td <?php if($_SESSION["seleccion"][0] == 4 && $_SESSION["seleccion"][1] == "X"){ echo 'style="background-color:red;"'; }?>>(q4,X,R)</td>
            <td></td>
        </tr>
        <tr>
            <td>q5</td>
            <td <?php if($_SESSION["seleccion"][0] == 5 && $_SESSION["seleccion"][1] == "0"){ echo 'style="background-color:red;"'; }?>>(q5,0,L)</td>
            <td <?php if($_SESSION["seleccion"][0] == 5 && $_SESSION["seleccion"][1] == "1"){ echo 'style="background-color:red;"'; }?>>(q6,1,R)</td>
            <td <?php if($_SESSION["seleccion"][0] == 5 && $_SESSION["seleccion"][1] == "X"){ echo 'style="background-color:red;"'; }?>>(q5,0,L)</td>
            <td></td>
        </tr>
        <tr>
            <td>q6</td>
            <td <?php if($_SESSION["seleccion"][0] == 6 && $_SESSION["seleccion"][1] == "0"){ echo 'style="background-color:red;"'; }?>>(q7,0,L)</td>
            <td></td>
            <td></td>
            <td></td>
        </tr>
        <tr>
            <td>q7</td>
            <td></td>
            <td <?php if($_SESSION["seleccion"][0] == 7 && $_SESSION["seleccion"][1] == "1"){ echo 'style="background-color:red;"'; }?>>(q8,1,L)</td>
            <td></td>
            <td></td>
        </tr>
        <tr>
            <td>q8</td>
            <td <?php if($_SESSION["seleccion"][0] == 8 && $_SESSION["seleccion"][1] == "0"){ echo 'style="background-color:red;"'; }?>>(q9,0,L)</td>
            <td></td>
            <td></td>
            <td <?php if($_SESSION["seleccion"][0] == 8 && $_SESSION["seleccion"][1] == "B"){ echo 'style="background-color:red;"'; }?>>(q10,B,R)</td>
        </tr>
        <tr>
            <td>q9</td>
            <td <?php if($_SESSION["seleccion"][0] == 9 && $_SESSION["seleccion"][1] == "0"){ echo 'style="background-color:red;"'; }?>>(q9,0,L)</td>
            <td></td>
            <td></td>
            <td <?php if($_SESSION["seleccion"][0] == 9 && $_SESSION["seleccion"][1] == "B"){ echo 'style="background-color:red;"'; }?>>(q0,B,R)</td>
        </tr>
        <tr>
            <td>q10</td>
            <td></td>
            <td <?php if($_SESSION["seleccion"][0] == 10 && $_SESSION["seleccion"][1] == "1"){ echo 'style="background-color:red;"'; }?>>(q11,B,R)</td>
            <td></td>
            <td></td>
        </tr>
        <tr>
            <td>q11</td>
            <td <?php if($_SESSION["seleccion"][0] == 11 && $_SESSION["seleccion"][1] == "0"){ echo 'style="background-color:red;"'; }?>>(q11,B,R)</td>
            <td <?php if($_SESSION["seleccion"][0] == 11 && $_SESSION["seleccion"][1] == "1"){ echo 'style="background-color:red;"'; }?>>(q12,B,R)</td>
            <td></td>
            <td></td>
        </tr>
    </tbody>
</table>
