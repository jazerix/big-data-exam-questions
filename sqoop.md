# Sqoop

## Questions

- How does sqoop transfer structured data to HDFS?
  - Through map-reduce tasks
- How many map-reduce tasks is used when important, by default?
  - 4
- How many files will sqoop output when importing?
  - As many as the map-reduce tasks.
- What is the default output format?
  - CSV files.
- What do you import with flume?
  - Strucuted data, such as databases (like MySQL, Oracle etc)
- When exporting, how does Sqoop split a database input.
  - It'll attempt to figure out the primary key and then split equally between N tasks.
- Where does Sqoop export into?
  - Raw files, HBase, Hive
- What is an import?
  - Database data being transferred to HDFS
- What is an export?
  - Database data being transffered from HDFS
- How do you interface with Sqoop?
  - Through the rest interface or CLI
- What does Sqoop reduce during the map-reduce when important?
  - Inherently, nothing will be reduced, as the import will consist of one-to-one lines in HDFS