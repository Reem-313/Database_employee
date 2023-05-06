CREATE TABLE `dept` (
  `DEPTNO` int (11) NOT NULL AUTO_INCREMENT,
  `DNAME` varchar (50) NOT NULL,
  `LOC` varchar (50) NOT NULL
)
CREATE TABLE `job` (
  `JOBID` int (11) NOT NULL AUTO_INCREMENT,
  `JOBNAME` varchar (50) NOT NULL
)
CREATE TABLE `employee` (
  'EmployeeID' int (11) NOT NULL AUTO_INCREMENT,
  'ENAME' varchar (50) NOT NULL,
  'JobID' int (11) NOT NULL CONSTRAINT FOREIGN KEY (`JobID`) REFERENCES `job` (`JOBID`),
  'MGR' int (11) DEFAULT NULL,
  'HIREDATE' date NOT NULL,
  'Salary' int (11) NOT NULL,
  'Commission' int (11)  NULL,
  'DeptID' int (11) NOT NULL CONSTRAINT FOREIGN KEY (`DeptID`) REFERENCES `dept` (`DEPTNO`)
  'addressID' int (11) NOT NULL,
  'carID' int (11) DEFAULT NULL CONSTRAINT FOREIGN KEY (`carID`) REFERENCES `Car` (`CARID`)
)
CREATE TABLE 'address' (
  'addressID' int (11) NOT NULL AUTO_INCREMENT,
  'city' varchar (50) NOT NULL
)
CREATE TABLE 'car' (
  'CarID' int (11) NOT NULL AUTO_INCREMENT,
  'carMake' varchar (50) NOT NULL,
  'carModel' varchar (50) NOT NULL,
  'carColor' varchar (50) NOT NULL
)

INSERT INTO `job` (`JOBID`, `JOBNAME`) VALUES ('1', 'CLERK')
INSERT INTO `job` (`JOBID`, `JOBNAME`) VALUES ('2', 'SALESMAN')
INSERT INTO `job` (`JOBID`, `JOBNAME`) VALUES ('3', 'MANAGER')
INSERT INTO `job` (`JOBID`, `JOBNAME`) VALUES ('4', 'PRESIDENT')
INSERT INTO `job` (`JOBID`, `JOBNAME`) VALUES ('5', 'ANALYST')

INSERT INTO `dept` (`DEPTNO`, `DNAME`, `LOC`) VALUES ('10', 'ACCOUNTING', 'NEW YORK')
INSERT INTO `dept` (`DEPTNO`, `DNAME`, `LOC`) VALUES ('20', 'RESEARCH', 'DALLAS')
INSERT INTO `dept` (`DEPTNO`, `DNAME`, `LOC`) VALUES ('30', 'SALES', 'CHICAGO')
INSERT INTO `dept` (`DEPTNO`, `DNAME`, `LOC`) VALUES ('40', 'OPERATIONS', 'BOSTON')

INSERT INTO `address` (`addressID`, `city`) VALUES ('1', 'Canterbury')
INSERT INTO `address` (`addressID`, `city`) VALUES ('2', 'Ramsgate')
INSERT INTO `address` (`addressID`, `city`) VALUES ('5', 'Folkstone')
INSERT INTO `address` (`addressID`, `city`) VALUES ('6', 'Ashford')

INSERT INTO `Car` (`CarID`, `carMake`, `carModel`, `carColor`) VALUES ('0', 'Volkswagen', 'Quantum', 'Blue')
INSERT INTO `Car` (`CarID`, `carMake`, `carModel`, `carColor`) VALUES ('1', 'Kia', 'SUV', 'Grey')
INSERT INTO `Car` (`CarID`, `carMake`, `carModel`, `carColor`) VALUES ('2', 'Volkswagen', 'Golf', 'Red')

INSERT INTO `emp`(`EmployeeID`, `ENAME`, `JobID`, `MGR`, `HIREDATE`, `Salary`, `Commission`, `DeptID`, `addressID`, `carID`) VALUES ('7369', 'SMITH', '1', '7902', '1980-12-17', '800', 'NULL', '20', '1', NULL)
INSERT INTO `emp`(`EmployeeID`, `ENAME`, `JobID`, `MGR`, `HIREDATE`, `Salary`, `Commission`, `DeptID`, `addressID`, `carID`) VALUES ('7499', 'ALLEN', '2', '7698', '1980-02-20', '1600', '300', '30', '6', NULL)
INSERT INTO `emp`(`EmployeeID`, `ENAME`, `JobID`, `MGR`, `HIREDATE`, `Salary`, `Commission`, `DeptID`, `addressID`, `carID`) VALUES ('7521', 'WARD', '2', '7698', '1980-02-22', '1250', '500', '30', '2', NULL)
INSERT INTO `emp`(`EmployeeID`, `ENAME`, `JobID`, `MGR`, `HIREDATE`, `Salary`, `Commission`, `DeptID`, `addressID`, `carID`) VALUES ('7566', 'JONES', '3', '7839', '1981-04-02', '2975', NULL, '20', '1', '2')
INSERT INTO `emp`(`EmployeeID`, `ENAME`, `JobID`, `MGR`, `HIREDATE`, `Salary`, `Commission`, `DeptID`, `addressID`, `carID`) VALUES ('7654', 'MARTIN', '2', '7698', '1981-09-28', '1250', '1400', '30', '5', NULL)
INSERT INTO `emp`(`EmployeeID`, `ENAME`, `JobID`, `MGR`, `HIREDATE`, `Salary`, `Commission`, `DeptID`, `addressID`, `carID`) VALUES ('7698', 'BLAKE', '3', '7839', '1981-05-01', '2850', NULL, '30', '1', '1')
INSERT INTO `emp`(`EmployeeID`, `ENAME`, `JobID`, `MGR`, `HIREDATE`, `Salary`, `Commission`, `DeptID`, `addressID`, `carID`) VALUES ('7782', 'CLARK', '3', '7839', '1981-06-09', '2450', NULL, '10', '5', '1')
INSERT INTO `emp`(`EmployeeID`, `ENAME`, `JobID`, `MGR`, `HIREDATE`, `Salary`, `Commission`, `DeptID`, `addressID`, `carID`) VALUES ('7839', 'KING', '4', NULL, '1981-11-17', '5000', NULL, '10', '5', '1')
INSERT INTO `emp`(`EmployeeID`, `ENAME`, `JobID`, `MGR`, `HIREDATE`, `Salary`, `Commission`, `DeptID`, `addressID`, `carID`) VALUES ('7844', 'TURNER', '2', '7698', '1981-09-08', '1500', '0', '30', '2', NULL)
INSERT INTO `emp`(`EmployeeID`, `ENAME`, `JobID`, `MGR`, `HIREDATE`, `Salary`, `Commission`, `DeptID`, `addressID`, `carID`) VALUES ('7876', 'ADAMS', '1', '7788', '1987-09-23', '1100', NULL, '20', '2', NULL)
INSERT INTO `emp`(`EmployeeID`, `ENAME`, `JobID`, `MGR`, `HIREDATE`, `Salary`, `Commission`, `DeptID`, `addressID`, `carID`) VALUES ('7900', 'JAMES', '1', '7698', '1981-12-03', '950', NULL, '30', '2', NULL)
INSERT INTO `emp`(`EmployeeID`, `ENAME`, `JobID`, `MGR`, `HIREDATE`, `Salary`, `Commission`, `DeptID`, `addressID`, `carID`) VALUES ('7902', 'FORD', '5', '7566', '1981-12-03', '3000', NULL, '20', '1', NULL)
INSERT INTO `emp`(`EmployeeID`, `ENAME`, `JobID`, `MGR`, `HIREDATE`, `Salary`, `Commission`, `DeptID`, `addressID`, `carID`) VALUES ('7934', 'MILLER', '1', '7782', '1982-01-23', '1300', NULL, '10', '2', NULL);
