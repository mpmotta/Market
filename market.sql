-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 29/04/2024 às 03:29
-- Versão do servidor: 10.4.32-MariaDB
-- Versão do PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `market`
--

-- --------------------------------------------------------

--
-- Estrutura para tabela `cidade`
--

CREATE TABLE `cidade` (
  `id` int(11) NOT NULL,
  `nome` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `cidade`
--

INSERT INTO `cidade` (`id`, `nome`) VALUES
(1, 'Porto Alegre'),
(2, 'Caxias do Sul'),
(3, 'Pelotas'),
(4, 'Florianópolis'),
(5, 'Curitiba'),
(6, 'São Paulo'),
(7, 'Rio de Janeiro'),
(8, 'Arambaré'),
(9, 'Miracema do Norte'),
(14, 'Carazinho'),
(15, 'Uruguaiana');

-- --------------------------------------------------------

--
-- Estrutura para tabela `cliente`
--

CREATE TABLE `cliente` (
  `id` int(11) NOT NULL,
  `nome` varchar(100) NOT NULL,
  `nascimento` date DEFAULT '1980-04-20',
  `salario` double DEFAULT 1412,
  `codCidade` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `cliente`
--

INSERT INTO `cliente` (`id`, `nome`, `nascimento`, `salario`, `codCidade`) VALUES
(1, 'Pedro Carneiro Pereira', '1994-04-02', 1250, 1),
(2, 'Maria do Bairro', '2001-06-10', 1666, 4),
(3, 'Carmem Rios', '2003-05-14', 1475.6, 5),
(4, 'Paulo Lumumba', '1984-03-08', 1917.56, 3),
(5, 'Charles Xavier', '1956-08-16', 2560.12, 9);

-- --------------------------------------------------------

--
-- Estrutura para tabela `produto`
--

CREATE TABLE `produto` (
  `id` int(11) NOT NULL,
  `categoria` varchar(30) NOT NULL,
  `nome` varchar(100) NOT NULL,
  `descricao` text NOT NULL,
  `valor` decimal(6,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `produto`
--

INSERT INTO `produto` (`id`, `categoria`, `nome`, `descricao`, `valor`) VALUES
(1, 'Celulares', 'iPhone 15 Pro Max', 'FORJADO EM TITÂNIO — O iPhone 15 Pro MAX tem design robusto e leve em titânio aeroespacial. Na parte de trás, vidro matte texturizado e, na frente, Ceramic Shield mais resistente que qualquer vidro de smartphone. Ele também é durão contra respingos, água e poeira\r\nFORJADO EM TITÂNIO — O iPhone 15 Pro tem design robusto e leve em titânio aeroespacial. Na parte de trás, vidro matte texturizado e, na frente, Ceramic Shield mais resistente que qualquer vidro de smartphone. Ele também é durão contra respingos, água e poeira\r\nTELA AVANÇADA — A tela Super Retina XDR de 6,7 pol. com ProMotion aumenta as taxas de atualização para 120 Hz quando você precisa de gráficos mais impressionantes. A Dynamic Island mostra alertas e Atividades ao Vivo. Além disso, com a tela Sempre Ativa, você nem precisa tocar na Tela Bloqueada para ficar de olho em tudo.', 9999.99),
(2, 'Eletrodomésticos', 'Lavadora de Roupas Brastemp 13kg', 'Lavadora de Roupas Brastemp 13kg Cesto Inox\r\nHoje em dia não dá nem pra imaginar viver sem uma Lavadora de Roupas, não é mesmo? Além de praticidade as lavadoras são capazes de deixar diversos tipos de tecidos e peças limpinhas e cheirosas. Vem conhecer essa Lavadora de roupas da Brastemp. Esse é o modelo BWK13 que vai deixar sua lavanderia ainda mais completa, sem falar na beleza dessa máquina de lavar na cor Branco. Ah, é importante você saber que ela tem capacidade de lavagem de 13kg, tá? Isso quer dizer que dá pra lavar as roupas acumuladas da semana, como os uniformes do trabalho e até as peças mais pesadas como roupas de cama e edredon, viu? Aí você vai contar com 12 programas de lavagem diferentes para cada tipo que precisar. Ela ainda conta com Motor Protetor térmico, o Material do Cesto é de Inox com base de plástico para durar muito tempo e tipo de água que ela utiliza é Água fria. Aproveite essa Lavadora e garanta mais facilidade na hora de cuidar das roupas sujas.', 1899.05),
(3, 'Eletrodomésticos', 'Forno Elétrico Mondial 52L', 'Forno Elétrico de Bancada Mondial com Timer\r\nCom capacidade de 52 litros, o forno elétrico FR-52 Grand Family II da Mondial aquece, cozinha, tosta, assa e grelha. Ele tem ajuste de temperatura até 250ºC, timer de 90 minutos, com alarme e desligamento automático, além de 1800W de potência. Este forno elétrico de bancada é prático e econômico, deixando os alimentos crocantes mais rápido. Suas resistências elétricas inferior e superior têm aquecimentos independentes, e você pode escolher com o botão superior qual resistência ligar. Com ele, você prepara os alimentos no tempo certo. Sua grelha tem regulagem de altura, e a bandeja é removível para facilitar a limpeza. Produzido em PP, Aço Inox e Vidro na cor preto e inox, com design moderno, vai deixar a sua cozinha mais bonita e com vários cardápios deliciosos na mesa!', 499.99),
(4, 'Móveis', 'Guarda-roupa Casal com Espelho', 'Guarda-roupa Casal com Espelho 6 Portas 4 Gavetas Araplac Braga\r\nO Guarda-Roupa de Casal Braga da Araplac é a solução perfeita para organizar e deixar os seus pertences sempre arrumados. Com um design moderno e sofisticado, este móvel possui 6 portas convencionais, sendo 2 com um detalhe de pintura ripado e espelhos, 4 gavetas internas e 6 prateleiras. Além disso, conta com divisórias internas para facilitar a organização de roupas, objetos e acessórios. Com 2 cabideiros para pendurar suas roupas, oferece praticidade adicional. Fabricado em MDP, Duratree e PVC, revestido em verniz UV e acabamento fosco na cor freijo e carbono, são materiais de excelente qualidade, este guarda-roupa garante durabilidade e resistência para acompanhar seu dia a dia com estil', 1044.91);

--
-- Índices para tabelas despejadas
--

--
-- Índices de tabela `cidade`
--
ALTER TABLE `cidade`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `cliente`
--
ALTER TABLE `cliente`
  ADD PRIMARY KEY (`id`),
  ADD KEY `codCidade` (`codCidade`);

--
-- Índices de tabela `produto`
--
ALTER TABLE `produto`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT para tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `cidade`
--
ALTER TABLE `cidade`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT de tabela `cliente`
--
ALTER TABLE `cliente`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de tabela `produto`
--
ALTER TABLE `produto`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Restrições para tabelas despejadas
--

--
-- Restrições para tabelas `cliente`
--
ALTER TABLE `cliente`
  ADD CONSTRAINT `cliente_ibfk_1` FOREIGN KEY (`codCidade`) REFERENCES `cidade` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
