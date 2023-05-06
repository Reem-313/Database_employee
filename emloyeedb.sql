CREATE TABLE `dept` (
  `DEPTNO` int (11) NOT NULL AUTO_INCREMENT,
  `DNAME` varchar (50) NOT NULL,
  `Location` varchar (50) NOT NULL
)
CREATE TABLE `job` (
  `JOBID` int (11) NOT NULL AUTO_INCREMENT,
  `JOBTitle` varchar (50) NOT NULL
)
CREATE TABLE `employee` (
  'EmployeeID' int (11) NOT NULL AUTO_INCREMENT,
  'ENAME' varchar (50) NOT NULL,
  'MGR' int (11) DEFAULT NULL,
  'HIREDATE' date NOT NULL,
  'Salary' int (11) NOT NULL,
  'Commission' int (11)  NULL,
  'DeptID' int (11) NOT NULL CONSTRAINT FOREIGN KEY (`DeptID`) REFERENCES `dept` (`DEPTNO`),
  'JobID' int (11) NOT NULL CONSTRAINT FOREIGN KEY (`JobID`) REFERENCES `job` (`JOBID`),
  'addressID' int (11) NOT NULL  CONSTRAINT FOREIGN KEY (`addressID`) REFERENCES `address` (`addressID`),
  'carID' int (11) DEFAULT NULL CONSTRAINT FOREIGN KEY (`carID`) REFERENCES `Car` (`CARID`)
)
CREATE TABLE `address` (
  'addressID' int (11) NOT NULL AUTO_INCREMENT,
  'City' varchar (50) NOT NULL
)
CREATE TABLE `car` (
  'CarID' int (11) NOT NULL AUTO_INCREMENT,
  'carMake' varchar (50) NOT NULL,
  'carModel' varchar (50) NOT NULL,
  'carColor' varchar (50) NOT NULL
)

INSERT INTO `job` (`JOBID`, `JOBTitle`) VALUES 
('1', 'CLERK')
('2', 'SALESMAN')
('3', 'MANAGER')
('4', 'PRESIDENT')
('5', 'ANALYST')

INSERT INTO `dept` (`DEPTNO`, `DNAME`, `Location`) VALUES 
('10', 'ACCOUNTING', 'NEW YORK')
('20', 'RESEARCH', 'DALLAS')
('30', 'SALES', 'CHICAGO')
('40', 'OPERATIONS', 'BOSTON')

INSERT INTO `address` (`addressID`, `City`) VALUES 
('1', 'Canterbury')
('2', 'Ramsgate')
('5', 'Folkstone')
('6', 'Ashford')

INSERT INTO `Car` (`CarID`, `carMake`, `carModel`, `carColor`) VALUES 
('0', 'Volkswagen', 'Quantum', 'Blue')
('1', 'Kia', 'SUV', 'Grey')
('2', 'Volkswagen', 'Golf', 'Red')

INSERT INTO employee (EmployeeID, ENAME, MGR, HIREDATE, Salary, Commision, DeptID, JobID, addressID, carID) VALUES
(7369, 'SMITH', 7902, '1987-12-17', 800, NULL, 20, 1, 1, NULL),
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
(7934, 'MILLER', 7782, '1982-01-23', 1300, NULL, 10, 1, 2, NULL);
