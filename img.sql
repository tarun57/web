CREATE TABLE `upload_data` (
  `ID` int(5) NOT NULL AUTO_INCREMENT,
  `USER_CODE` int(4) unsigned zerofill NOT NULL,
  `FILE_NAME` varchar(200) NOT NULL,
  `FILE_SIZE` varchar(200) NOT NULL,
  `FILE_TYPE` varchar(200) NOT NULL,
  PRIMARY KEY (`ID`)
)
