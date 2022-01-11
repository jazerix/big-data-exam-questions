# Map Reduce

Map reduce is a general term that is usally a way of aggregating data across one or many clusters.

For the given sample input the first map emits:

```
< Hello, 1>
< World, 1>
< Bye, 1>
< World, 1>
```

The second map emits:
```
< Hello, 1>
< Hadoop, 1>
< Goodbye, 1>
< Hadoop, 1>
```

A local combiner is used to aggregate the data before data is sent through the reducer.

The output of the first map:
```
< Bye, 1>
< Hello, 1>
< World, 2>
```
The output of the second map:
```
< Goodbye, 1>
< Hadoop, 2>
< Hello, 1>
```

We then reduce the results across the cluster(s):

```
< Bye, 1>
< Goodbye, 1>
< Hadoop, 2>
< Hello, 2>
< World, 2>
```

## How many maps

The number of maps is usually driven by the total size of the inputs, that is, the total number of blocks of the input files.

## Questions

- What stages are there in map reduce?
  - Map, Shuffle and Reduce
- Who is responsible for the map reduce task?
  - YARN
- What are input splits?
  - When a map-reduce task is initiated each mapping is mapped into a split of a fixed size
- What happens if the (input) splits are too small?
  - Managing the splits starts creating a substantial overhead
- what happens if the (input) splits are too large?
  - The input may not be as effectily read concurrently. Small splits allows the syster to better run the mapping in parallel.
- Where are (input) splits mapped at?
  - Hadoop will do its best to map the splits on the same node as the data is located at. If nodes are busy, a node on the same rack can be chosen. 
- Where is the map outputted to?
  - The disk and not HDFS - The data is intermediate, and should no be "persisted".
- What happens if map task fails, during mapping?
  - Hadoop will automatically start it elsewhere
- What is the default amount of reducers?
  - Hadoop is set to 1 by default, this should in production be increased to increase performance. 
- What is shuffling?
  - Shuffling is the process when multiple maps gets copied to multiple reducers.
- Are reducers always required?
  - No, not always. For exammple when we need to find a min/max over splits, a reducer isn't required. These are called combiner functions.
- What are combiner functions?
  - Smallers functions that is used instead of a complete reduce task, such as finding the max value among splits.