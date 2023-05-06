CREATE TABLE `address` (
  `addressID` int(11) NOT NULL,
  `City` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT INTO `address` (`addressID`, `City`) VALUES
(1, 'Canterbury'),
(2, 'Ramsgate'),
(5, 'Folkstone'),
(6, 'Ashford');

CREATE TABLE `car` (
  `CarID` int(11) NOT NULL,
  `carMake` varchar(50) NOT NULL,
  `carModel` varchar(50) NOT NULL,
  `carColor` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT INTO `car` (`CarID`, `carMake`, `carModel`, `carColor`) VALUES
(1, 'Volkswagen', 'Quantum', 'Blue'),
(2, 'Kia', 'SUV', 'Grey'),
(3, 'Volkswagen', 'Golf', 'Red');

CREATE TABLE `dept` (
  `DEPTNO` int(11) NOT NULL,
  `DNAME` varchar(50) NOT NULL,
  `Location` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT INTO `dept` (`DEPTNO`, `DNAME`, `Location`) VALUES
(10, 'ACCOUNTING', 'NEW-YORK'),
(20, 'RESEARCH', 'DALLAS'),
(30, 'SALES', 'CHICAGO'),
(40, 'OPERATIONS', 'BOSTON'),
(41, 'DEVELOPMENT', 'LONDON');

CREATE TABLE `employee` (
  `EmployeeID` int(11) NOT NULL,
  `ENAME` varchar(50) NOT NULL,
  `MGR` int(11) DEFAULT NULL,
  `HIREDATE` date NOT NULL,
  `Salary` int(11) NOT NULL,
  `Commision` int(11) DEFAULT NULL,
  `DeptID` int(11) NOT NULL,
  `JobID` int(11) NOT NULL,
  `addressID` int(11) NOT NULL,
  `carID` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT INTO `employee` (`EmployeeID`, `ENAME`, `MGR`, `HIREDATE`, `Salary`, `Commision`, `DeptID`, `JobID`, `addressID`, `carID`) VALUES
(7369, 'SMITH', 7902, '1987-12-17', 800, NULL, 20, 1, 1, NULL),
(7370, 'Kieran', 7902, '2023-05-09', 50000, 300, 41, 4, 5, 1),
(7371, 'Reem', 7369, '2023-05-06', 3000, 100, 10, 1, 1, 1),
(7372, 'Josh', 7370, '2023-03-08', 1000, 0, 10, 2, 5, NULL),
(7373, 'Henry', 7369, '2023-05-13', 2000, 0, 10, 1, 2, NULL),
(7499, 'ALLEN', 7698, '1981-02-20', 1600, 300, 30, 2, 6, NULL),
(7521, 'WARD', 7698, '1981-02-22', 1250, 500, 30, 2, 2, NULL),
(7566, 'JONES', 7839, '1981-04-02', 2975, NULL, 20, 4, 1, 2),
(7654, 'MARTIN', 7698, '1981-09-28', 1250, 1400, 30, 2, 5, NULL),
(7698, 'BLAKE', 7839, '1981-05-01', 2850, NULL, 30, 4, 1, 1),
(7782, 'CLARK', 7839, '1981-06-09', 2450, NULL, 10, 4, 5, 1),
(7839, 'KING', NULL, '0000-00-00', 5000, NULL, 10, 4, 5, 1),
(7844, 'TURNER', 7698, '1981-09-08', 1500, 0, 40, 2, 2, NULL),
(7876, 'ADAMS', 7788, '1987-09-23', 1100, NULL, 20, 1, 2, NULL),
(7900, 'JAMES', 7698, '1981-12-03', 950, NULL, 30, 2, 2, NULL),
(7902, 'FORD', 7566, '1981-12-03', 3000, NULL, 20, 6, 1, NULL),
(7934, 'MILLER', 7782, '1982-01-23', 1300, NULL, 10, 1, 2, NULL),
(7936, 'Amy', 7521, '2023-04-20', 3000, 0, 10, 4, 1, 2),
(7937, 'Mark', 7839, '2022-12-16', 5000, 0, 40, 4, 6, NULL);

CREATE TABLE `job` (
  `JOBID` int(11) NOT NULL,
  `JOBTitle` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT INTO `job` (`JOBID`, `JOBTitle`) VALUES
(1, 'CLERK'),
(2, 'SALESMAN'),
(4, 'MANAGER'),
(6, 'ANALYST'),
(8, 'PRESIDENT');

ALTER TABLE `address`
  ADD PRIMARY KEY (`addressID`);

ALTER TABLE `car`
  ADD PRIMARY KEY (`CarID`);

ALTER TABLE `dept`
  ADD PRIMARY KEY (`DEPTNO`);

ALTER TABLE `employee`
  ADD PRIMARY KEY (`EmployeeID`),
  ADD KEY `MGR_FK` (`MGR`),
  ADD KEY `DeptID` (`DeptID`),
  ADD KEY `JobID` (`JobID`),
  ADD KEY `AddressID` (`addressID`),
  ADD KEY `carID` (`carID`);

ALTER TABLE `job`
  ADD PRIMARY KEY (`JOBID`);

ALTER TABLE `address`
  MODIFY `addressID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

ALTER TABLE `car`
  MODIFY `CarID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

ALTER TABLE `dept`
  MODIFY `DEPTNO` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

ALTER TABLE `employee`
  MODIFY `EmployeeID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7938;

ALTER TABLE `job`
  MODIFY `JOBID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

ALTER TABLE `employee`
  ADD CONSTRAINT `employee_ibfk_1` FOREIGN KEY (`JobID`) REFERENCES `job` (`JOBID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `employee_ibfk_2` FOREIGN KEY (`addressID`) REFERENCES `address` (`addressID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `employee_ibfk_3` FOREIGN KEY (`DeptID`) REFERENCES `dept` (`DEPTNO`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `employee_ibfk_4` FOREIGN KEY (`carID`) REFERENCES `car` (`CarID`) ON DELETE CASCADE ON UPDATE CASCADE;
