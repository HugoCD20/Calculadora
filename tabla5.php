
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
            <td  <?php if($_SESSION["seleccion"][0] == 2 && $_SESSION["seleccion"][1] == "0"){ echo 'style="background-color:red;"'; } ?>>(q3,X,R)</td>
            <td  <?php if($_SESSION["seleccion"][0] == 2 && $_SESSION["seleccion"][1] == "1"){ echo 'style="background-color:red;"'; } ?>>(q5,1,L)</td>
            <td></td>
            <td></td>
        </tr>
        <tr>
            <td>q3</td>
            <td <?php if($_SESSION["seleccion"][0] == 3 && $_SESSION["seleccion"][1] == "0"){ echo 'style="background-color:red;"'; }?>>(q3,0,R)</td>
            <td <?php if($_SESSION["seleccion"][0] == 3 && $_SESSION["seleccion"][1] == "1"){ echo 'style="background-color:red;"'; }?>>(q3,1,R)</td>
            <td <?php if($_SESSION["seleccion"][0] == 3 && $_SESSION["seleccion"][1] == "X"){ echo 'style="background-color:red;"'; }?>>(q3,X,R)</td>
            <td <?php if($_SESSION["seleccion"][0] == 3 && $_SESSION["seleccion"][1] == "B"){ echo 'style="background-color:red;"'; }?>>(q4,0,L)</td>
        </tr>
        <tr>
            <td>q4</td>
            <td <?php if($_SESSION["seleccion"][0] == 4 && $_SESSION["seleccion"][1] == "0"){ echo 'style="background-color:red;"'; }?>>(q4,0,L)</td>
            <td <?php if($_SESSION["seleccion"][0] == 4 && $_SESSION["seleccion"][1] == "1"){ echo 'style="background-color:red;"'; }?>>(q22,1,L)</td>
            <td></td>
            <td></td>
        </tr>
        <tr>
            <td>q5</td>
            <td></td>
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
            <td <?php if($_SESSION["seleccion"][0] == 10 && $_SESSION["seleccion"][1] == "1"){ echo 'style="background-color:red;"'; }?>>(q11,1,R)</td>
            <td></td>
            <td></td>
        </tr>
        <tr>
            <td>q11</td>
            <td <?php if($_SESSION["seleccion"][0] == 11 && $_SESSION["seleccion"][1] == "0"){ echo 'style="background-color:red;"'; }?>>(q11,0,R)</td>
            <td <?php if($_SESSION["seleccion"][0] == 11 && $_SESSION["seleccion"][1] == "1"){ echo 'style="background-color:red;"'; }?>>(q12,1,R)</td>
            <td></td>
            <td></td>
        </tr>
        <tr>
            <td>q12</td>
            <td <?php if($_SESSION["seleccion"][0] == 12 && $_SESSION["seleccion"][1] == "0"){ echo 'style="background-color:red;"'; }?>>(q22,X,R)</td>
            <td></td>
            <td <?php if($_SESSION["seleccion"][0] == 12 && $_SESSION["seleccion"][1] == "X"){ echo 'style="background-color:red;"'; }?>>(q12,X,R)</td>
            <td></td>
        </tr>
        <tr>
            <td>q13</td>
            <td <?php if ($_SESSION["seleccion"][0] == 13 && $_SESSION["seleccion"][1] == "0") { echo 'style="background-color:red;"'; } ?>>(q13,0,R)</td>
            <td <?php if ($_SESSION["seleccion"][0] == 13 && $_SESSION["seleccion"][1] == "1") { echo 'style="background-color:red;"'; } ?>>(q13,1,R)</td>
            <td></td>
            <td <?php if ($_SESSION["seleccion"][0] == 13 && $_SESSION["seleccion"][1] == "B") { echo 'style="background-color:red;"'; } ?>>(q14,B,L)</td>
        </tr>
        <tr>
            <td>q14</td>
            <td <?php if ($_SESSION["seleccion"][0] == 14 && $_SESSION["seleccion"][1] == "0") { echo 'style="background-color:red;"'; } ?>>(q15,B,L)</td>
            <td <?php if ($_SESSION["seleccion"][0] == 14 && $_SESSION["seleccion"][1] == "1") { echo 'style="background-color:red;"'; } ?>>(q17,1,L)</td>
            <td></td>
            <td></td>
        </tr>
        <tr>
            <td>q15</td>
            <td <?php if ($_SESSION["seleccion"][0] == 15 && $_SESSION["seleccion"][1] == "0") { echo 'style="background-color:red;"'; } ?>>(q15,0,L)</td>
            <td <?php if ($_SESSION["seleccion"][0] == 15 && $_SESSION["seleccion"][1] == "1") { echo 'style="background-color:red;"'; } ?>>(q15,1,L)</td>
            <td <?php if ($_SESSION["seleccion"][0] == 15 && $_SESSION["seleccion"][1] == "X") { echo 'style="background-color:red;"'; } ?>>(q15,X,L)</td>
            <td <?php if ($_SESSION["seleccion"][0] == 15 && $_SESSION["seleccion"][1] == "B") { echo 'style="background-color:red;"'; } ?>>(q16,0,R)</td>
        </tr>
        <tr>
            <td>q16</td>
            <td <?php if ($_SESSION["seleccion"][0] == 16 && $_SESSION["seleccion"][1] == "0") { echo 'style="background-color:red;"'; } ?>>(q16,0,R)</td>
            <td <?php if ($_SESSION["seleccion"][0] == 16 && $_SESSION["seleccion"][1] == "1") { echo 'style="background-color:red;"'; } ?>>(q16,1,R)</td>
            <td <?php if ($_SESSION["seleccion"][0] == 16 && $_SESSION["seleccion"][1] == "X") { echo 'style="background-color:red;"'; } ?>>(q16,X,R)</td>
            <td <?php if ($_SESSION["seleccion"][0] == 16 && $_SESSION["seleccion"][1] == "B") { echo 'style="background-color:red;"'; } ?>>(q14,B,L)</td>
        </tr>
        <tr>
            <td>q17</td>
            <td <?php if ($_SESSION["seleccion"][0] == 17 && $_SESSION["seleccion"][1] == "0") { echo 'style="background-color:red;"'; } ?>>(q17,0,L)</td>
            <td <?php if ($_SESSION["seleccion"][0] == 17 && $_SESSION["seleccion"][1] == "1") { echo 'style="background-color:red;"'; } ?>>(q17,1,L)</td>
            <td <?php if ($_SESSION["seleccion"][0] == 17 && $_SESSION["seleccion"][1] == "X") { echo 'style="background-color:red;"'; } ?>>(q17,X,L)</td>
            <td <?php if ($_SESSION["seleccion"][0] == 17 && $_SESSION["seleccion"][1] == "B") { echo 'style="background-color:red;"'; } ?>>(q0,B,R)</td>
        </tr>
        <tr>
            <td>q18</td>
            <td <?php if ($_SESSION["seleccion"][0] == 18 && $_SESSION["seleccion"][1] == "0") { echo 'style="background-color:red;"'; } ?>>(q18,0,L)</td>
            <td <?php if ($_SESSION["seleccion"][0] == 18 && $_SESSION["seleccion"][1] == "1") { echo 'style="background-color:red;"'; } ?>>(q18,1,L)</td>
            <td <?php if ($_SESSION["seleccion"][0] == 18 && $_SESSION["seleccion"][1] == "X") { echo 'style="background-color:red;"'; } ?>>(q18,X,L)</td>
            <td <?php if ($_SESSION["seleccion"][0] == 18 && $_SESSION["seleccion"][1] == "B") { echo 'style="background-color:red;"'; } ?>>(q19,B,R)</td>
        </tr>
        <tr>
            <td>q19</td>
            <td <?php if ($_SESSION["seleccion"][0] == 19 && $_SESSION["seleccion"][1] == "0") { echo 'style="background-color:red;"'; } ?>>(q19,B,R)</td>
            <td <?php if ($_SESSION["seleccion"][0] == 19 && $_SESSION["seleccion"][1] == "1") { echo 'style="background-color:red;"'; } ?>>(q19,B,R)</td>
            <td <?php if ($_SESSION["seleccion"][0] == 19 && $_SESSION["seleccion"][1] == "X") { echo 'style="background-color:red;"'; } ?>>(q20,B,R)</td>
            <td></td>
        </tr>
        <tr>
            <td>q20</td>
            <td <?php if ($_SESSION["seleccion"][0] == 20 && $_SESSION["seleccion"][1] == "0") { echo 'style="background-color:red;"'; } ?>>(q20,B,R)</td>
            <td <?php if ($_SESSION["seleccion"][0] == 20 && $_SESSION["seleccion"][1] == "1") { echo 'style="background-color:red;"'; } ?>>(q24,B,R)</td>
            <td <?php if ($_SESSION["seleccion"][0] == 20 && $_SESSION["seleccion"][1] == "X") { echo 'style="background-color:red;"'; } ?>>(q20,B,R)</td>
            <td></td>
        </tr>
        <tr>
            <td>q21</td>
            <td <?php if ($_SESSION["seleccion"][0] == 21 && $_SESSION["seleccion"][1] == "0") { echo 'style="background-color:red;"'; } ?>>(q13,0,R)</td>
            <td <?php if ($_SESSION["seleccion"][0] == 21 && $_SESSION["seleccion"][1] == "1") { echo 'style="background-color:red;"'; } ?>>(q18,1,L)</td>
            <td></td>
            <td></td>
        </tr>
        <tr>
            <td>q22</td>
            <td <?php if ($_SESSION["seleccion"][0] == 22 && $_SESSION["seleccion"][1] == "0") { echo 'style="background-color:red;"'; } ?>>(q22,0,L)</td>
            <td <?php if ($_SESSION["seleccion"][0] == 22 && $_SESSION["seleccion"][1] == "1") { echo 'style="background-color:red;"'; } ?>>(q23,1,L)</td>
            <td <?php if ($_SESSION["seleccion"][0] == 22 && $_SESSION["seleccion"][1] == "X") { echo 'style="background-color:red;"'; } ?>>(q22,X,L)</td>
            <td></td>
        </tr>
        <tr>
            <td>q23</td>
            <td <?php if ($_SESSION["seleccion"][0] == 23 && $_SESSION["seleccion"][1] == "0") { echo 'style="background-color:red;"'; } ?>>(q23,0,L)</td>
            <td <?php if ($_SESSION["seleccion"][0] == 23 && $_SESSION["seleccion"][1] == "1") { echo 'style="background-color:red;"'; } ?>>(q23,1,L)</td>
            <td <?php if ($_SESSION["seleccion"][0] == 23 && $_SESSION["seleccion"][1] == "X") { echo 'style="background-color:red;"'; } ?>>(q2,X,R)</td>
            <td></td>
        </tr>
        <tr>
            <td>q24</td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
        </tr>

    </tbody>
</table>
