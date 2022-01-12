# HBase

## Questions

- What are row keys?
  - Primary key of a table
- What is the type of the row key?
  - Byte array (can contain anything basically)
- What are column families?
  - A grouping of multiple columns, such as info:format, info:geo
- What is the significance of column families?
  - Data locality, they are ensured to be stored together
- Can you add new columns to a defined table?
  - You can only add columns to already existing column families
- How do HBase differ from Relational-Database-Management-System (RBDMS)?
  - Columns are versioned, columns are grouped into column families. 
- How are rows sorted in hbase?
  - Using the row key ("primary key")
- What is ZooKeeper's role in hbase?
  - Synchronization between database nodes, contains meta data such as what other instances are running, transaction status, as well as node heart beats. Additionally, connecting clients, contact zookeeper to get location information about other nodes. 
- Why is the status of a transaction submitted to ZooKeeper?
  - Should a node fail, another node can start over.
- What is the significance of using a byte array as row key?
  - Since rows are sorted according to this key, we can measure the size of the key to find for example, the last entry by getting the largest row key.
- How are HBase distributed?
  -  Tables are partitioned into regions, row wise at some point, across the cluster. A single sever can have multiple regions located.
- How are regions stored in the meta data?
  - Region name, start row and creation time. 
- What is the default region size?
  - 1GB
- What is the purpose of the HMaster?
  - Administrative tasking such as to create/delete tables