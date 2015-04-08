-- phpMyAdmin SQL Dump
-- version 3.4.5
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Apr 08, 2015 at 10:55 AM
-- Server version: 5.5.16
-- PHP Version: 5.3.8

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `newsapp`
--

-- --------------------------------------------------------

--
-- Table structure for table `article`
--

CREATE TABLE IF NOT EXISTS `article` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) CHARACTER SET latin1 NOT NULL,
  `body` text CHARACTER SET latin1 NOT NULL,
  `excerpt` mediumtext NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id` (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=12 ;

--
-- Dumping data for table `article`
--

INSERT INTO `article` (`id`, `title`, `body`, `excerpt`, `created_at`, `updated_at`) VALUES
(1, 'Breaking news!', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc massa orci, elementum nec hendrerit eget, rutrum tincidunt leo. Cras pharetra non metus a tempus. Quisque rhoncus lacus ex, quis consectetur nunc venenatis a. Aliquam erat volutpat. In urna odio, dapibus non tortor viverra, tempus elementum mi. Vivamus sagittis orci quis dolor dictum aliquam. Donec rhoncus, purus vel sodales laoreet, libero sem commodo neque, non fermentum lectus magna in sem. Etiam sodales sodales elementum. Donec feugiat, nisi non hendrerit aliquam, nibh turpis efficitur turpis, dictum ultrices diam urna eu est. Maecenas quis pellentesque purus. Pellentesque id finibus dui. In id augue tellus. Praesent elementum magna gravida malesuada mattis. Ut ligula turpis, scelerisque a convallis ut, lacinia ac diam. Aenean suscipit vestibulum urna, eget venenatis mi blandit ultricies. Ut eu massa at nisi ultricies scelerisque sed eu neque. Mauris eget enim tempus, sollicitudin est viverra, hendrerit mi. Donec quis felis non nulla condimentum iaculis eget id lectus. Curabitur vitae diam tempus, ullamcorper risus vel, consectetur enim. Sed ultricies lacus urna, quis luctus ligula vehicula vitae. Donec et vulputate enim. Fusce nibh nunc, condimentum ac lacus eu, maximus auctor quam. Cras justo lacus, facilisis nec interdum id, lacinia vehicula orci. Suspendisse sed est sit amet lacus malesuada finibus non in lectus. Quisque a purus ante. Nam ac sapien hendrerit, lobortis dui in, dapibus nulla. Pellentesque sed rutrum velit. Nam augue eros, interdum et faucibus a, finibus id neque. Vestibulum rhoncus vel justo ut sollicitudin. Quisque imperdiet eros ac eros lobortis, ac molestie libero fringilla. Proin convallis tellus sit amet vehicula vehicula. Nam ultrices tempor metus vel mollis. Nulla id efficitur velit. Quisque eu porta justo. Phasellus placerat nisl odio, ac consequat sem dignissim a. Suspendisse consectetur leo efficitur lacus vehicula, quis auctor lectus suscipit. Duis faucibus arcu et augue finibus varius. In ut hendrerit odio, non ullamcorper tortor. Nulla consequat lorem id est ullamcorper, eu laoreet dui vulputate. Nulla dictum ipsum a egestas aliquet. Nam ac risus vel nisi condimentum viverra. Integer volutpat lacus vel dolor lobortis cursus. Vivamus sit amet diam lacus. Ut a mi vel felis auctor hendrerit. Suspendisse sagittis dolor sit amet rutrum laoreet. Aenean fringilla scelerisque lorem, ac iaculis nibh euismod vitae. Vestibulum nec tempus lorem, a bibendum risus. Nullam pretium augue vel magna placerat suscipit. In finibus eleifend purus, ut posuere nisi efficitur iaculis. Vestibulum blandit libero at augue eleifend, id faucibus libero ullamcorper. Nunc interdum pellentesque orci vitae condimentum. Aliquam euismod magna ac molestie feugiat. Etiam ultrices orci leo, ut mollis diam luctus nec. Sed euismod vulputate libero aliquam malesuada. Quisque scelerisque augue posuere, lobortis sem viverra, tempus orci. Ut vitae lacinia sem. Nam ut erat ut augue porttitor bibendum. Etiam ac pellentesque metus.', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc massa orci, elementum nec hendrerit eget, rutrum tincidunt leo. Cras pharetra non metus a tempus. Quisque rhoncus lacus ex, quis consectetur nunc venenatis a. Aliquam erat volutpat. In urna odio, dapibus non tortor viverra, tempus elementum mi. Vivamus sagittis orci quis dolor dictum aliquam. Donec rhoncus, purus vel sodales laoreet, libero sem commodo neque, non fermentum lectus magna in sem. Etiam sodales sodales elementum. Donec...', '2015-04-08 10:54:16', '2015-04-08 10:54:16'),
(2, 'Something for the beerlover, Free beer for all!', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc massa orci, elementum nec hendrerit eget, rutrum tincidunt leo. Cras pharetra non metus a tempus. Quisque rhoncus lacus ex, quis consectetur nunc venenatis a. Aliquam erat volutpat. In urna odio, dapibus non tortor viverra, tempus elementum mi. Vivamus sagittis orci quis dolor dictum aliquam. Donec rhoncus, purus vel sodales laoreet, libero sem commodo neque, non fermentum lectus magna in sem. Etiam sodales sodales elementum. Donec feugiat, nisi non hendrerit aliquam, nibh turpis efficitur turpis, dictum ultrices diam urna eu est. Maecenas quis pellentesque purus. Pellentesque id finibus dui. In id augue tellus. Praesent elementum magna gravida malesuada mattis. Ut ligula turpis, scelerisque a convallis ut, lacinia ac diam. Aenean suscipit vestibulum urna, eget venenatis mi blandit ultricies. Ut eu massa at nisi ultricies scelerisque sed eu neque. Mauris eget enim tempus, sollicitudin est viverra, hendrerit mi. Donec quis felis non nulla condimentum iaculis eget id lectus. Curabitur vitae diam tempus, ullamcorper risus vel, consectetur enim. Sed ultricies lacus urna, quis luctus ligula vehicula vitae. Donec et vulputate enim. Fusce nibh nunc, condimentum ac lacus eu, maximus auctor quam. Cras justo lacus, facilisis nec interdum id, lacinia vehicula orci. Suspendisse sed est sit amet lacus malesuada finibus non in lectus. Quisque a purus ante. Nam ac sapien hendrerit, lobortis dui in, dapibus nulla. Pellentesque sed rutrum velit. Nam augue eros, interdum et faucibus a, finibus id neque. Vestibulum rhoncus vel justo ut sollicitudin. Quisque imperdiet eros ac eros lobortis, ac molestie libero fringilla. Proin convallis tellus sit amet vehicula vehicula. Nam ultrices tempor metus vel mollis. Nulla id efficitur velit. Quisque eu porta justo. Phasellus placerat nisl odio, ac consequat sem dignissim a. Suspendisse consectetur leo efficitur lacus vehicula, quis auctor lectus suscipit. Duis faucibus arcu et augue finibus varius. In ut hendrerit odio, non ullamcorper tortor. Nulla consequat lorem id est ullamcorper, eu laoreet dui vulputate. Nulla dictum ipsum a egestas aliquet. Nam ac risus vel nisi condimentum viverra. Integer volutpat lacus vel dolor lobortis cursus. Vivamus sit amet diam lacus. Ut a mi vel felis auctor hendrerit. Suspendisse sagittis dolor sit amet rutrum laoreet. Aenean fringilla scelerisque lorem, ac iaculis nibh euismod vitae. Vestibulum nec tempus lorem, a bibendum risus. Nullam pretium augue vel magna placerat suscipit. In finibus eleifend purus, ut posuere nisi efficitur iaculis. Vestibulum blandit libero at augue eleifend, id faucibus libero ullamcorper. Nunc interdum pellentesque orci vitae condimentum. Aliquam euismod magna ac molestie feugiat. Etiam ultrices orci leo, ut mollis diam luctus nec. Sed euismod vulputate libero aliquam malesuada. Quisque scelerisque augue posuere, lobortis sem viverra, tempus orci. Ut vitae lacinia sem. Nam ut erat ut augue porttitor bibendum. Etiam ac pellentesque metus.', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc massa orci, elementum nec hendrerit eget, rutrum tincidunt leo. Cras pharetra non metus a tempus. Quisque rhoncus lacus ex, quis consectetur nunc venenatis a. Aliquam erat volutpat. In urna odio, dapibus non tortor viverra, tempus elementum mi. Vivamus sagittis orci quis dolor dictum aliquam. Donec rhoncus, purus vel sodales laoreet, libero sem commodo neque, non fermentum lectus magna in sem. Etiam sodales sodales elementum. Donec...', '2015-04-08 10:54:38', '2015-04-08 10:54:38'),
(4, 'An indepth article about manatees', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc massa orci, elementum nec hendrerit eget, rutrum tincidunt leo. Cras pharetra non metus a tempus. Quisque rhoncus lacus ex, quis consectetur nunc venenatis a. Aliquam erat volutpat. In urna odio, dapibus non tortor viverra, tempus elementum mi. Vivamus sagittis orci quis dolor dictum aliquam. Donec rhoncus, purus vel sodales laoreet, libero sem commodo neque, non fermentum lectus magna in sem. Etiam sodales sodales elementum. Donec feugiat, nisi non hendrerit aliquam, nibh turpis efficitur turpis, dictum ultrices diam urna eu est. Maecenas quis pellentesque purus. Pellentesque id finibus dui. In id augue tellus. Praesent elementum magna gravida malesuada mattis. Ut ligula turpis, scelerisque a convallis ut, lacinia ac diam. Aenean suscipit vestibulum urna, eget venenatis mi blandit ultricies. Ut eu massa at nisi ultricies scelerisque sed eu neque. Mauris eget enim tempus, sollicitudin est viverra, hendrerit mi. Donec quis felis non nulla condimentum iaculis eget id lectus. Curabitur vitae diam tempus, ullamcorper risus vel, consectetur enim. Sed ultricies lacus urna, quis luctus ligula vehicula vitae. Donec et vulputate enim. Fusce nibh nunc, condimentum ac lacus eu, maximus auctor quam. Cras justo lacus, facilisis nec interdum id, lacinia vehicula orci. Suspendisse sed est sit amet lacus malesuada finibus non in lectus. Quisque a purus ante. Nam ac sapien hendrerit, lobortis dui in, dapibus nulla. Pellentesque sed rutrum velit. Nam augue eros, interdum et faucibus a, finibus id neque. Vestibulum rhoncus vel justo ut sollicitudin. Quisque imperdiet eros ac eros lobortis, ac molestie libero fringilla. Proin convallis tellus sit amet vehicula vehicula. Nam ultrices tempor metus vel mollis. Nulla id efficitur velit. Quisque eu porta justo. Phasellus placerat nisl odio, ac consequat sem dignissim a. Suspendisse consectetur leo efficitur lacus vehicula, quis auctor lectus suscipit. Duis faucibus arcu et augue finibus varius. In ut hendrerit odio, non ullamcorper tortor. Nulla consequat lorem id est ullamcorper, eu laoreet dui vulputate. Nulla dictum ipsum a egestas aliquet. Nam ac risus vel nisi condimentum viverra. Integer volutpat lacus vel dolor lobortis cursus. Vivamus sit amet diam lacus. Ut a mi vel felis auctor hendrerit. Suspendisse sagittis dolor sit amet rutrum laoreet. Aenean fringilla scelerisque lorem, ac iaculis nibh euismod vitae. Vestibulum nec tempus lorem, a bibendum risus. Nullam pretium augue vel magna placerat suscipit. In finibus eleifend purus, ut posuere nisi efficitur iaculis. Vestibulum blandit libero at augue eleifend, id faucibus libero ullamcorper. Nunc interdum pellentesque orci vitae condimentum. Aliquam euismod magna ac molestie feugiat. Etiam ultrices orci leo, ut mollis diam luctus nec. Sed euismod vulputate libero aliquam malesuada. Quisque scelerisque augue posuere, lobortis sem viverra, tempus orci. Ut vitae lacinia sem. Nam ut erat ut augue porttitor bibendum. Etiam ac pellentesque metus.', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc massa orci, elementum nec hendrerit eget, rutrum tincidunt leo. Cras pharetra non metus a tempus. Quisque rhoncus lacus ex, quis consectetur nunc venenatis a. Aliquam erat volutpat. In urna odio, dapibus non tortor viverra, tempus elementum mi. Vivamus sagittis orci quis dolor dictum aliquam. Donec rhoncus, purus vel sodales laoreet, libero sem commodo neque, non fermentum lectus magna in sem. Etiam sodales sodales elementum. Donec...', '2015-04-08 01:19:53', '2015-04-08 10:55:10');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(255) CHARACTER SET latin1 NOT NULL,
  `key` varchar(255) CHARACTER SET latin1 NOT NULL,
  `admin` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id` (`id`,`email`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `email`, `key`, `admin`) VALUES
(1, 'gridur@gmail.com', '2bc83f8ba19f3d666c18b985319fb9d4b22d4a7049c9b11ca0b5ade5', 1),
(2, 'user@test.com', '2bc83f8ba19f3d666c18b985319fb9d4b22d4a7049c9b11ca0b5ade5', 0),
(3, 'admin@test.com', '2bc83f8ba19f3d666c18b985319fb9d4b22d4a7049c9b11ca0b5ade5', 1);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
