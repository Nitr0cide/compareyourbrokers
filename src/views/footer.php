<footer class="site-footer">
    <div class="container">
        <div class="row">
            <div class="col-sm-12 col-md-6">
                <h6>A propos</h6>
                <p class="text-justify">Alors que les brokers continuent de se multiplier sur Internet, il est difficile d'y trouver son compte et de ne pas tomber sur des arnaques qui sont de plus en plus présentes. Compare Your Broker a pour vocation à aider les investisseurs novices ou même expérimentés à trouver le broker qui correspond le plus à ses attentes. Pour cela, plusieurs outils sont à votre disposition. Vous pouvez répondre aux 4 questions dans "Trouver votre Broker" pour voir quel est celui qui conviendrait le plus à vos critères, ou tout simplement parcourir notre comparateur ! Si vous avez des questions supplémentaires, n'hésitez pas à nous joindre par mail via "Contact"</p>
            </div>

            <div class="col-xs-6 col-md-3">
                <h6>Catégories</h6>
                <ul class="footer-links">
                    <li><a href="<?= $router->generate("home") ?>">Accueil</a></li>
                    <li><a href="<?= $router->generate("comparator") ?>">Tableaux comparatifs</a></li>
                    <li><a href="<?= $router->generate("findbroker") ?>">Questionnaire</a></li>
                </ul>
            </div>

            <div class="col-xs-6 col-md-3">
                <h6>Navigation rapide</h6>
                <ul class="footer-links">
                    <li><a href="<?= $router->generate("contacts") ?>">Contactez-nous</a></li>
                    <li><a href="<?= $router->generate("home") ?>">Mentions légales</a></li>
                </ul>
            </div>
        </div>
        <hr>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-sm-6 col-xs-12">
                <p class="copyright-text">Copyright &copy; 2020 All Rights Reserved by
                    <a href="<?= $router->generate("home") ?>">Compareyourbrokers.com</a>.
                </p>
            </div>

            <div class="col-md-4 col-sm-6 col-xs-12">
                <ul class="social-icons">
                    <li><a class="facebook" href="#"><i class="fa fa-facebook"></i></a></li>
                    <li><a class="twitter" href="#"><i class="fa fa-twitter"></i></a></li>
                    <li><a class="-instagram" href="#"><i class="fa fa-instagram"></i></a></li>
                    <li><a class="linkedin" href="#"><i class="fa fa-linkedin"></i></a></li>
                </ul>
            </div>
        </div>
    </div>
</footer>
</body>
<!--===============================================================================================-->
<script src="/vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
<script src="/vendor/animsition/js/animsition.min.js"></script>
<!--===============================================================================================-->
<script src="/vendor/daterangepicker/moment.min.js"></script>
<script src="/vendor/daterangepicker/daterangepicker.js"></script>
<!--===============================================================================================-->
<!--===============================================================================================-->
<script src="/js/map-custom.js"></script>
<!--===============================================================================================-->
<script src="/js/main.js"></script>

<script src="/js/custom.js"></script>
<script src="https://code.jquery.com/jquery-3.4.1.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
</html>