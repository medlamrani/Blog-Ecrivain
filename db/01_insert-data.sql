
INSERT INTO `post` (`id`, `user_id`, `title`, `content`, `addDate`, `updateDate`) VALUES
(1, 1, 'Chapitre I', 'Les aurores boréales… Un phénomène lumineux splendide qui fait rêver chacun d’entre nous. Comme toutes les manifestations naturelles, les aurores boréales sont imprévisibles. Pourtant, il existe des endroits dans le monde où il est plus facile de les apercevoir. Mais où partir observer les aurores boréales ? État des lieux de la Laponie à l’Islande, en passant par le Canada, l’Alaska et la Russie.\r\n\r\nUn spectacle incomparable, inoubliable pour celui qui y a assisté. Soudain, un déluge de nuées colorées zèbre le ciel. Des teintes vertes, bleues, jaunes ou rouges jaillissent au cœur de la nuit polaire. Un effet visuel éblouissant est créé par cette succession de voiles nébuleux, distillant une atmosphère féerique. Voilà, vous venez de voir une aurore boréale…\r\n\r\nUn tour de magie céleste ? Non, un phénomène lumineux. L’aurore boréale, aussi appelée aurore polaire, se produit principalement dans les zones proches des pôles magnétiques, entre 65 et 75° de latitude. Les pôles agissent alors comme des puissants aimants, qui attirent les particules solaires. Celles-ci se heurtent à la couche supérieure de l’atmosphère, l’ionosphère, composée d’atomes d’oxygène et d’azote.\r\n\r\nC’est alors que les particules solaires s’embrasent, laissant jaillir des fulgurances lumineuses. Leurs couleurs dépendent de la nature des molécules : les dégradés verdoyants sont les plus fréquents, mais toutes les teintes du spectre chromatique sont possibles.\r\n\r\n', '2020-06-15 07:19:19', '2020-06-15 09:25:25'),
(2, 1, 'Chapitre II', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque ut eros quis nisi lacinia congue a quis ante. Etiam sollicitudin, ex quis fermentum venenatis, eros nisi scelerisque purus, cursus venenatis neque nulla at risus. Donec sit amet justo at leo viverra ultrices. Suspendisse convallis aliquet arcu, non vestibulum velit varius eget. Sed molestie tempor purus eget malesuada. Morbi fermentum facilisis augue, nec mollis odio mattis eu. Suspendisse volutpat ultricies augue, vitae pretium turpis rhoncus ut. Nullam fringilla lacinia metus, vel maximus arcu fringilla a. Nulla gravida nulla lectus, quis vehicula magna pharetra sit amet. Curabitur quis tellus at orci tincidunt consequat vel nec libero. Integer rhoncus eu felis quis pellentesque. Integer vehicula sed est et tristique.
Donec finibus, mi sit amet consectetur facilisis, nunc magna vestibulum massa, non scelerisque mi enim vel justo. Fusce sit amet felis sem. Praesent enim orci, dapibus id porttitor id, volutpat nec diam. Nunc ut est ac leo aliquet feugiat. Sed eget augue magna. Integer ut libero at lectus pretium maximus nec ac leo. Nulla eu vestibulum quam. Quisque a felis sollicitudin, eleifend felis sit amet, convallis leo. Donec quis risus metus. Pellentesque sit amet felis a tortor posuere suscipit. Pellentesque odio est, tempor congue condimentum eget, bibendum et dolor. Sed efficitur varius ullamcorper. Ut tincidunt nibh sit amet ornare interdum.', '2020-06-22 21:33:48', '2020-06-22 21:33:48');


INSERT INTO `comment` (`id`, `post_id`, `author`, `content`, `report`, `commentDate`) VALUES
(1, 6, 'Haydara', 'Pas mal comme chapitre', 1, '2020-06-22 17:28:23');


INSERT INTO `user` (`id`, `username`, `password`) VALUES
(1, 'Haydara', 'qwerty123');