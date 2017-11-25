USE CourseDB;

SELECT 3*(count(distinct rCourseID)+major.NumMajorEle+major.NumMajorOrMinorEle)
FROM requirment,major
WHERE requirment.majorName=major.majorName AND requirment.majorOrMinor=major.majorOrMinor 
AND requirment.majorName='BA MATH'
AND requirment.majorOrMinor='';