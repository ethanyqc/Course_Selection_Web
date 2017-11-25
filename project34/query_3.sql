USE CourseDB;

SELECT  distinct rcourseID
FROM requirment
WHERE (requirment.majorName ='BA MATH' AND requirment.majorOrMinor ='BS CS')or(requirment.majorName ='BS CS' AND requirment.majorOrMinor ='BA MATH') 
UNION
SELECT  distinct ecourseID
FROM elective
WHERE (elective.majorName ='BA MATH' AND elective.majorOrMinor ='BS CS')or(elective.majorName ='BS CS' AND elective.majorOrMinor ='BA MATH');