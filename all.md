#  Topics covered

- Kafka
- DFS
  - Hadoop
  - AVRO
  - Parquet

## Kafka



### Read

1. https://www.confluent.io/blog/event-sourcing-outgrows-the-database/

### Hadoop (DFS)

Hadoop originally based on Google file system. 

Hadoop consists of three layers
   - HDFS
   - Yarn
   - Processing (MapReduce)

- Large blocksize to reduce seek times. 
- We need metadata for each file
  - Stored on namenode
  - Maps the chunks
  - Basic file information
  - Resource manager
- Datanode

1. https://data-flair.training/blogs/hdfs-data-write-operation/