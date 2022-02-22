<?php
require_once("./inc/autoLoadClassesLogin.inc.php");
session_start();
$clientsController = new ClientsController();
$clientsController->forwardToAgreement();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KyZXEAg3QhqLMpG8r+8fhAXLRk2vvoC2f3B09zVXn8CA5QIVfZOJ3BCsw2P0p/We" crossorigin="anonymous">
    <link rel="stylesheet" href="./Css/agreement.css" class="rel">

    <!-- <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script> -->
    <title>Document</title>
</head>

<body>
    <div class="container-body" id="pdf-convert">
        <?php foreach ($clientsController->forwardToAgreement() as $key) : ?>
            <div class="header">
                <p>Payment Agreement</p>
            </div>
            <div class="second-layer">
                <p>KNOW ALL MEN BY THESE PRESENTS:</p>
            </div>
            <div class="third-layer">
                <p>This Contract is entered by and between:</p>
            </div>
            <div class="fourth-layer">
                <p><span class="debtor-name"><?php echo $key['firstname'] . ' ' . $key['middlename'] . ' ' .  $key['lastname'] ?></span>, of legal age, <span class="civil-status">single</span>, <span class="citizenship">filipino</span>, whose principal place of address is at <span class="address">110 4th St. GHQ Brgy. Katuparan Taguig City</span>, (hereinafter referred to as "DEBTOR");</p>
            </div>
            <div class="fifth-layer">
                <p>- and -</p>
            </div>
            <div class="sixth-layer">
                <p>Cashmart Philippines</p>
            </div>
            <div class="seventh-layer">
                <div class="seventh-content">
                    <p> 1. Debtor Representation </p>
                    <span class="seventh-indent"></span>
                    <p> The DEBTOR hereby represents and warrants that both parties in this agreement have set a payment plan to secure the deficiency in a scheduled manner set herein without further interruption, notwithstanding an additional fees for processing of such scheduling.</p>
                </div>

                <br>
                <br>
                <br>
                <div class="seventh-content">
                    <p> 2. Payment Plan </p>
                </div>
                <span class="seventh-indent"></span> The Parties hereby agree to the scheduled payment plan, as to the declaration of its contents found on Exhibit A attached hereto (the "Payment Plan"). The DEBTOR shall conform to the schedule set and shall pay to the CREDITOR before or upon due the amount as indicated on the Payments Schedule table.
                <br>
                <br>
                <br>
                <div class="seventh-content">
                    <p> 3. Payment Method </p>
                </div>
                <span class="seventh-indent"> </span> Payment shall preferrably be made to the CREDITOR in accordance to the mode as indicated in the Payment Plan, but in any case, the DEBTOR may choose his method of payment to his convenience.
                <br>
                <br>
                <br>
                <div class="seventh-content">
                    <p> 4. Indmnification </p>
                </div>
                <span class="seventh-indent"></span> In consideration for this Agreement, the CREDITOR hereby releases any other claims against the DEBTOR in relation to fees and penalties resulting from the deficiency or any damages prior this Agreement. However, no obligation shall release the DEBTOR from its obligations herein or limit the rights of the CREDITOR in relation to this Agreement.
                <br>
                <br>
                <br>
                <div class="seventh-content">
                    <p> 5. Acceleration Clause </p>
                </div>
                <span class="seventh-indent"></span> In the occurrence that the DEBTOR fails to render payment upon reaching fifteen (15) days after the scheduled payment plan, the full amount of the deficiency shall become due and demandable. Any further failure shall give rise to the right to the CREDITOR to demand for damages.
                <br>
                <br>
                <br>
                <div class="seventh-content">
                    <p> 6. Agreement Modification </p>
                </div>
                <span class="seventh-indent"></span> No modification of this Agreement shall be considered valid unless made in writing and agreed upon by both Parties.
                <br>
                <br>
                <br>
                <div class="seventh-content">
                    <p> 7. Assignment of </p> Rights
                </div>
                <span class="seventh-indent"></span> The CREDITOR may transfer or assign this Agreement to a third party provided that a written notice to the DEBTOR is given. In the event of such assignment, the assignee may amend the schedule of payment found in this Agreement.
                <br>
                <br>
                <br>
                <div class="seventh-content">
                    <p> 8. Sevrability </p>
                </div>
                <span class="seventh-indent"></span> Should any provision found in this Agreement be held invalid, illegal, or unenforceable by any competent court, the same shall apply only to the provision and the rest of the remaining provisions hereto shall remain valid and enforceable.
                <br>
                <br>
                <br>
                <div class="seventh-content">
                    <p> 9. Applicable Law </p>
                </div>
                <span class="seventh-indent"></span> This Agreement shall be governed by and construed in accordance with the laws of the State of {stateJurisdiction}. Subject to the exclusive jurisdiction of {countryJurisdiction}, {stateJurisdiction}.

            </div>
            <br>
            <br>
            <br>
            <div class="eight-layer">
                <p>IN WITNESS WHEREOF, the Parties has executed this Agreement, on this {day} day of {month}, {year}, in {stateJurisdiction}, {countryJurisdiction}.</p>
            </div>
            <br>
            <div class="ninth-layer">
                <div class="container-ninth-inside">
                    <div class="ninth-inside-left">
                        <p>Name & Signature of Debtor</p>
                    </div>
                    <div class="ninth-inside-right">
                        <p>Name & Signature of Creditor</p>
                    </div>
                </div>
            </div>
            <br>
            <br>
            <br>
            <br>
            <br>
            <div class="tenth-layer">
                <div class="tenth-table">
                    <table>
                        <tr>
                            <td>Amount to Pay</td>
                            <td>Due Date</td>
                        </tr>
                        <tr>
                            <td>7,000</td>
                            <td>January 25, 2022</td>
                        </tr>
                    </table>
                </div>
            </div>
            <br>
            <br>
            <div class="ninth-layer">
                <div class="container-ninth-inside">
                    <div class="ninth-inside-left">
                        <p>Name & Signature of Debtor</p>
                    </div>
                    <div class="ninth-inside-right">
                        <p>Name & Signature of Creditor</p>
                    </div>
                </div>
            </div>
            <label id="contract-no" class="contract-no"><?php echo $key['application_no'] ?></label>
        <?php endforeach; ?>
    </div>






</body>
<!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.5.0/polyfills.es.js"></script> -->
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.5.3/jspdf.debug.js"></script>
<script src="./js/agreement.js"></script>

</html>