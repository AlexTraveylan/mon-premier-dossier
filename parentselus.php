<?php include './config/debut.php'; ?>

<body>
    <section class="partie2">
        <div class="formtext">
            <h5> <u> Compte rendu des conseils d'école</u></h5>
            <a href="assets/conseil3.pdf" target="blank_">compte rendu écrit du mardi 28 juin 18h (Prise de note rapide sans relecture)</a><br><br>
            <u>Résumé des points essentiels :</u>
            <ul>
                <li> Les enseignants ont organisé énormement de sorties et de projets cette année, cela leur a demandé beaucoup d'efforts et beaucoup de temps personnel,
                    ils comptent sur les parents pour de l'aide et de l'investissement pour les aider à l'organisation dans les prochaines années, sans ce soutien, ils
                    n'auront plus l'energie ni la motivation de le faire au detriment de leur vie personnelle.
                </li><br>
                <li>
                    Des travaux de sécurité seront effectués pendants les vacances scolaires particulierement pour sécuriser la cour de maternelle.
                </li><br>
                <li>
                    L'entrée de l'école est trop petite pour les 250 élèves, les elementaires devront rentrer dans la cour par le couloir qui longe le college.
                </li><br>
                <li>
                    L'année prochaine le local vélo, prévu initialement uniquement pour le personnel, ne pourra plus être utilisé par les élèves.
                </li><br>
                <li>
                    Probleme avec la rue et les voitures mal garés. Qui rend très difficile les sorties scolaires en bus scolaire.
                    Il est possible de rendre la rue pietonne le matin, ils ont le matériel mais pas assez d'agents pour le faire. Et ce n'est pas leur métier.
                </li><br>
                <li>
                    Sarah Bernhardt a effectué des actions très appréciés, particulierement pour la liaison CM2 / 6eme.
                </li><br>
                <li>
                    Les enseignants ont souligné que la majorité des parents attendent toujours le dernier moment pour apporter les documents ou matériels demandés,
                    ce qui est une source de stress pour eux, qu'ils interpretent comme un manque d'implication des parents. Ce qui les découragent
                    dans leurs demarches de proposer des activités interessantes pour nos enfants.
                </li><br>
                <li>
                    Pour ouvrir le self à la cantine en élémentaire, ils ont besoin de 9 agents. Ils en ont que 7. Sans action des parents auprès de la mairie
                    pour demander ces agents, le self restera fermé.
                </li><br>
                <li>Les parents peuvent agir pour :
                    <ol>
                        <li>Accelerer les travaux de sécurité du batiment aupres de la mairie</li><br>
                        <li>Demander plus de personnel de la marie pour augmenter la sécurité de la rue et ouvrir le self</li><br>
                        <li>Exiger que les enseignants absents soient remplacés par du personnel remplacant de l'education nationale, particulierement
                            pour celles qui sont prévisibles (Sejour à l'hopital programmé, maternité)</li>
                    </ol>
                </li>

            </ul>
        </div>

        <?php if (
            isset($_SESSION['confirme']) && ($_SESSION['confirme'] == 1)
        ) : ?>

            <section class="formtext">
                <h5><u>Vous pouvez en discuter ici </u>:</h5>
                <?php
                $isban = $db->prepare('SELECT * FROM utilisateurs WHERE user_id=?');
                $isban->execute([$_SESSION['user_id']]);
                $isbaned = $isban->fetch();
                if (!$isbaned['ban']) : ?>

                    <form action="configchat.php" method="post" class="configchat" id="form1" name="form1">
                        <textarea class="mess" name="mess" cols="" rows="1" placeholder="Exprimez-vous ici :" required onkeypress="validerForm(event);"></textarea>
                        <button class="btnmess" type="submit">-></button>
                    </form>

                    <?php include('./config/chat.php'); ?>
                <?php else : ?>

                    <form class="configchat">
                        <textarea class="mess" name="mess" cols="" rows="1" placeholder="Vous avez été banni par un adminstrateur pour le motif suivant : <?php echo ($isbaned['motif']); ?>"></textarea>
                        <button type="submit">Vous ne pouvez plus envoyer de message</button>
                    </form>
                    <?php include('./config/chat.php'); ?>
                <?php endif; ?>

            </section>
        <?php else : ?>

            <section class="formtext">
                <p class="formtexterror">
                    Connectez vous sur le site pour faire des commentaires ou poser des questions.
                </p>
            </section>

        <?php endif; ?>

    </section>

</body>

<?php include './headers/footer.php'; ?>

</html>