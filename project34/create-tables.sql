CREATE DATABASE CourseDB;

USE CourseDB;

CREATE TABLE course
(
  courseID CHAR(15) NOT NULL,
  courseTitle CHAR(50)    NOT NULL,
  credit INT NOT NULL,
  offerSem	  CHAR(10) NOT NULL,
  CONSTRAINT crsePK PRIMARY KEY (courseID),
  CONSTRAINT crseSK UNIQUE (courseTitle)
);

CREATE TABLE major
(
  majorName CHAR(50)    NOT NULL,
  majorOrMinor Char(50),  
  NumMajorEle INT NOT NULL,
  NumMajorOrMinorEle INT,
  CONSTRAINT mPK PRIMARY KEY (majorName,majorOrMinor)
  
);

CREATE TABLE requirment
(
  majorName CHAR(50)    NOT NULL,
  majorOrMinor Char(50),
  rCourseID CHAR(15) NOT NULL,
  CONSTRAINT reqPK PRIMARY KEY (rCourseID, majorName,majorOrMinor),
  CONSTRAINT reqcIDFK FOREIGN KEY (rCourseID) REFERENCES course(courseID),
  CONSTRAINT reqmNamFK FOREIGN KEY (majorName,majorOrMinor) REFERENCES major(majorName,majorOrMinor)
);

CREATE TABLE elective
(
  majorName CHAR(50)    NOT NULL,
  majorOrMinor Char(50),
  eCourseID CHAR(15) NOT NULL,
  electivList CHAR(3) NOT NULL,
  CONSTRAINT elePK PRIMARY KEY (eCourseID, majorName,majorOrMinor),
  CONSTRAINT elecIDFK FOREIGN KEY (eCourseID) REFERENCES course(courseID),
  CONSTRAINT elemNamFK FOREIGN KEY (majorName,majorOrMinor) REFERENCES major(majorName,majorOrMinor)
);

CREATE TABLE prerequisite
(
  courseID CHAR(15) NOT NULL,
  pCourseID CHAR(15) ,
  CONSTRAINT prePK PRIMARY KEY (courseID, pCourseID),
  CONSTRAINT precIDFK FOREIGN KEY (courseID) REFERENCES course(courseID),
  CONSTRAINT prePCIDFK FOREIGN KEY (pCourseID) REFERENCES course(courseID)
);
