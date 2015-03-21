
--
-- Database: `oorden`
--

-- --------------------------------------------------------

--
-- Table structure for table `api_keys`
--

CREATE TABLE IF NOT EXISTS `api_keys` (
  `key_id` int(11) NOT NULL,
  `site` varchar(50) COLLATE utf8_bin NOT NULL,
  `public` varchar(100) COLLATE utf8_bin NOT NULL,
  `private` varchar(100) COLLATE utf8_bin NOT NULL,
  `added_date` datetime NOT NULL,
  `updated_date` datetime NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `api_keys`
--
ALTER TABLE `api_keys`
  ADD PRIMARY KEY (`key_id`), ADD KEY `public` (`public`), ADD KEY `private` (`private`), ADD KEY `user_id` (`user_id`), ADD KEY `site` (`site`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `api_keys`
--
ALTER TABLE `api_keys`
  MODIFY `key_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=1;