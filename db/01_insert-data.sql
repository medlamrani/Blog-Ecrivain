
INSERT INTO `post` (`id`, `author`, `title`, `contain`, `addDate`, `updateDate`) VALUES
(6, 'Mohamed', 'Aurores boréales', 'Les aurores boréales… Un phénomène lumineux splendide qui fait rêver chacun d’entre nous. Comme toutes les manifestations naturelles, les aurores boréales sont imprévisibles. Pourtant, il existe des endroits dans le monde où il est plus facile de les apercevoir. Mais où partir observer les aurores boréales ? État des lieux de la Laponie à l’Islande, en passant par le Canada, l’Alaska et la Russie.\r\n\r\nUn spectacle incomparable, inoubliable pour celui qui y a assisté. Soudain, un déluge de nuées colorées zèbre le ciel. Des teintes vertes, bleues, jaunes ou rouges jaillissent au cœur de la nuit polaire. Un effet visuel éblouissant est créé par cette succession de voiles nébuleux, distillant une atmosphère féerique. Voilà, vous venez de voir une aurore boréale…\r\n\r\nUn tour de magie céleste ? Non, un phénomène lumineux. L’aurore boréale, aussi appelée aurore polaire, se produit principalement dans les zones proches des pôles magnétiques, entre 65 et 75° de latitude. Les pôles agissent alors comme des puissants aimants, qui attirent les particules solaires. Celles-ci se heurtent à la couche supérieure de l’atmosphère, l’ionosphère, composée d’atomes d’oxygène et d’azote.\r\n\r\nC’est alors que les particules solaires s’embrasent, laissant jaillir des fulgurances lumineuses. Leurs couleurs dépendent de la nature des molécules : les dégradés verdoyants sont les plus fréquents, mais toutes les teintes du spectre chromatique sont possibles.\r\n\r\n', '2020-06-15 07:19:19', '2020-06-15 09:25:25'),
(14, 'Haydara', 'L''attaque des vaches folles', '<p><span style="color: #b96ad9;">Hello everyboooooody</span></p>', '2020-06-22 21:33:48', '2020-06-22 21:33:48');


INSERT INTO `comments` (`id`, `postId`, `author`, `contain`, `report`, `commentDate`) VALUES
(12, 6, 'Haydara', 'khkh', 1, '2020-06-22 17:28:23');


INSERT INTO `user` (`id`, `username`, `password`) VALUES
(1, 'Haydara', 'qwerty123');