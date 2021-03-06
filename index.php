<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="css/buefy.min.css">
    <!-- <link rel="stylesheet" href="https://cdn.materialdesignicons.com/2.5.94/css/materialdesignicons.min.css"> -->
    <link rel="stylesheet" href="css/font-awesome.css">
</head>

<body>

    <?php 
        require_once 'ViewController.php';

        if(isset($_POST['submit'])) {
            
            $data = json_decode(file_get_contents("php://input"), true);

            $pdf = new ViewPDF();
            $pdf->generateIdentification( $_POST );
        }
    ?>

    <div id="app">
        <!-- Buefy components goes here -->

        <div class="hero is-large is-fullheight">

            <div class="hero-head">
                <div class="container has-text-centered">
                    <img src="images/msa_convention_banner.png"/>
                </div>
            </div>

            <div class="hero-body">
                <div class="container">
                    <div class="columns is-centered">
                        <div class="column is-12-tablet is-12-desktop">
                            <form class="box" method="POST">

                                <b-field grouped>
                                    <b-field label="Firstname">
                                        <b-input type="text"
                                            name="data[firstname][]"
                                            required
                                            placeholder="John">
                                        </b-input>
                                    </b-field>

                                    <b-field label="Lastname">
                                        <b-input type="text"
                                            name="data[lastname][]"
                                            required
                                            placeholder="Doe">
                                        </b-input>
                                    </b-field>

                                    <b-field label="Campname">
                                        <b-input type="text"
                                            name="data[campname][]"
                                            required
                                            placeholder="Davao City">
                                        </b-input>
                                    </b-field>

                                    <b-field label="Membership">
                                        <b-select placeholder="Select Membership" name="data[membership][]" required>
                                            <option value="gideon">Gideon</option>
                                            <option value="auxiliary">Auxiliary</option>
                                        </b-select>
                                    </b-field>

                                    <b-field label="Roles">
                                        <b-select placeholder="Select Role" name="data[roles][]" required>
                                            <option value="host">Host</option>
                                            <option value="co-host">Co-host</option>
                                            <option value="member">Member</option>                                
                                        </b-select>
                                    </b-field>
                                </b-field>

                                <b-field grouped>
                                    <b-field label="Firstname">
                                        <b-input type="text"
                                            name="data[firstname][]"
                                            required
                                            placeholder="John">
                                        </b-input>
                                    </b-field>

                                    <b-field label="Lastname">
                                        <b-input type="text"
                                            name="data[lastname][]"
                                            required
                                            placeholder="Doe">
                                        </b-input>
                                    </b-field>

                                    <b-field label="Campname">
                                        <b-input type="text"
                                            name="data[campname][]"
                                            required
                                            placeholder="Davao City">
                                        </b-input>
                                    </b-field>

                                    <b-field label="Membership">
                                        <b-select placeholder="Select Membership" name="data[membership][]" required>
                                            <option value="gideon">Gideon</option>
                                            <option value="auxiliary">Auxiliary</option>
                                        </b-select>
                                    </b-field>

                                    <b-field label="Roles">
                                        <b-select placeholder="Select Role" name="data[roles][]" required>
                                            <option value="host">Host</option>
                                            <option value="co-host">Co-host</option>
                                            <option value="member">Member</option>                                
                                        </b-select>
                                    </b-field>
                                </b-field>

                                <button type="submit" name="submit" class="button btn-color is-right">Generate ID</button>
                                
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div> 
        
    </div>

    <script src="js/vue.js"></script>
    <!-- Full bundle -->
    <script src="js/buefy.js"></script>
    <script src="js/axios.js"></script>

    <script>
        new Vue({
            el: '#app',
        });
    </script>

    <style>

        .hero.is-large .hero-body {
            padding-top: 0px;
        }
        /* .column {
            margin-top: 5rem;
        }
        .hero-head img {
            margin:auto;
        } */

        .hero {
            background: #2EBB7F;
        }
        
        .btn-color {
            background: #2EBB7F;
            color: #FFFFFF;
        }
    </style>
</body>
</html>