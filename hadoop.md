# Hadoop


## Questions
- Can you update a file in HDFS?
  - Files are immutable meaning they can't be altered, but you can append to them.
- Why are larger block sizes preffered?
    - It reduces seek time and we generally work with larger files
- What is the default block size of HDFS?
  - 128 MB
- Default replica factor?
  - 3
- Are blocks placed on the same node?
  - No, they are distributed
- When writing to a cluster, how many nodes does the client write to?
  - One - The namenode will provide a datanode to write the file. Once done, the client will receieve an ack when all the data nodes have finished.
- Where does communication happen?
  - Communication is done through the namenode (coordinator)
- What are the benefits of distributing the blocks?
  - A file can be read from multiple nodes increasing throughput
- What is data locality?
  - When processing data (map of map reduce) we want to run these tasks locally without having to pull data from other nodes. 
- Why should random reads be avoided?
  - Random reads means that you need to seek more, which takes more time.
- Where are the blocks placed?
  - It depends on the BlockPlacementPolicy. For example to ensure that data is split across racks. 
- When should you use Avro?
  - Avro is great when you need to read an entire entity
- When should you use Parquet?
  - Since Parquet is column based, it is great for aggregation of columns.
- What are Avro and Parquet
  - They are hadoop specific ways of serializing data
- In parquet, where is the schema stored?
  - at the end of the file, in the footer.
- In Avro, where is the schema stored?
  - JSON format in the beginning of the file. 
- Why is Avro and Parquet faster than plain-text?
  - Data is compressed, minimizing data size.
- Which is faster, Avro or Parquet?
  - Avro is better for writing, whereas parquet is better for reading and analyzing data.
- What does the footer in Parquet consist of?
  - The first 8 bytes tell how large the meta data is, then you can seek backwards of that amount to get the metadata.
- How can Parquet files be splitted?
  - Parquet files contain a number of blocks that each contain a row group with a number of column chunks. Each chunk can be splitted across the cluster allowing for map reduce
- How does parquet compress data?
  - It looks at the data in the column and minimizes its usage, for example if all the numbers are below 256 in length, they can be placed in bytes. It also changes encoding as necessary
- What does a parquet block consits of?
  - It consits of a row group that in turn consits of column chunks
- In parquet, what is a column chunk?
  - A column chunk is a compressed list of values with the same type as the column's. Each column chunk contains an amount of pages that each are 1MB in size (by default)
- How do you update the schema (schema evolution) in parquet?
  - You can create a new schema using hive, and then copy the data over. This is extremely costly.
- What happens in the footer of a parquet file?
  - It contains the schema, metadata of each row group (block); like the encoding, offsets, sizes.
- In Avro, how does schema evolution work?
  - We can use a different schema when reading, with default values for columns that may not exist, thos the schema can gradually evolve. 