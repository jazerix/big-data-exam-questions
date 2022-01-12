# Yarn

- What does yarn stand for?
  - yet another resource negotiator
- What two daemons does yarn provide?
  - One running in the cluster that keeps track of resources, and one on each node of the nodes that launches and monitors containers. 
- What makes YARN great?
  - Schelduling, works somewhat like the OS scheduler, for tasks in the cluster. Input can run FIFO, FILO etc.
- What does yarn manage?
  - Map reduce tasks amongst other things.
- What ist the difference between YARN and ZooKeeper?
  - YARN controls scheudling of tasks and makes sure there are enough resources to start the task, ZooKeeper is more about synchronization between nodes. In Kafka, ZooKeeper makes sure a new leader node is elected, should the current brake down.