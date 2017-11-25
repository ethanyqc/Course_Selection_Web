USE CourseDB;

SELECT (count(distinct rCourseID)+major.NumMajorEle+major.NumMajorOrMinorEle)/4
FROM requirment,major
WHERE requirment.majorName=major.majorName AND requirment.majorOrMinor=major.majorOrMinor 
AND requirment.majorName='BA MATH'
AND requirment.majorOrMinor='';