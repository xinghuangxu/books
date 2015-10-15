---
title: BugCache for Inspections, Hit or Miss?
---

###Abstract
* Most companies do not have the resources to inspect all the code; thus accurate defect prediction can help focus available inspection resources.
* BugCache (From paper "Predicting faults from cached history") is a simple, elegant, award-winning prediction scheme that "caches" files that are likely to contain defects.
* Contribution of this paper:
  * BugCache is in fact useful for focusing inspection effort
  * BugCache is not much better than a naive prediction model - viz., a model that orders files in the system 
  by their count of closed bugs and chooses enough files to capture 20% of the lines in the system

###Evalution of FixCache from the point of view of a stakeholder involved in code inspection
1. Evaluate Defect Density and the cost effectiveness of inspection.  
  Result: FixCache does indeed find more bug-dense entities
1. Of the different cache update policies it uses, which is most effective?
  Result: They are about the same.
1. Whether certain modifications to the cache update policies would improve FIXCACHE's performance with respect to the inspection cost-effectiveness.
  Result: There is not much difference in the performance of different update and replacement policies.
1. Whether FIXCACHE outperforms in terms of inspection cost effectiveness, a very simple standard bug prediction model?
  Result: there is not much different.

###Fixcache
To start, the cache is primed with a set of files, typically the largest files. Then, the FixCache algorithm monitors the commits
to the system and updates its cache using a set of policies. A hit occurs when a file in the cache under goes a bug fix; a miss occurs
when a file outside the cache receives a bug fix.
The cached's contents at any one point in time, contains the target set of buggy files for testing or inspection.

###Three types of locality:
1. faults are more likely to occur in recently added/changed entities(churn locality).
1. if an entity contains a fault then it is likely to contain more faults (temporal locality).
1. entities that are logically cooupled (by co-changes) with other faulty entities are more likely to contain faults (spatial locality).

###FixCache update policies

####When a bug-fix is committed
1. FixCache adds the modified files to its cache (temporal locality policy)
1. FixCache retroactively finds and adds the files in which the bug was introduced, as well as the files that were most often committed together with these files at that time.
(spatial locality)
1. FixCache adds recently added/changed files to the cache. (churn locality policy)

#### Evaluation of FixCache in the original Paper
* Kim et al. empirically evaluated FixCache using various cache sizes (most often 10% of the entities in the system)
and found it very accurate(73% - 95%) at identifying faulty files.
* On the method granularity the accuracy fall within 46% - 72%
* This paper's implementation of FixCache has a hit rate of 60% - 80% at file granularity.

###Research Questions
1. What proportion of the total lines of code are in the FixCache?
2. Do the cached files have higher defect density (defects per line of code) than files not in the cache?
3. How do temporal and spatial locality policies affect FixCache performance?
4. Can we improve FixCache to achieve better defect density?
5. When used for inspections, is Fixcache doing better than a naive model that simply picks previously buggy files?

###Evaluating Predicition Performance
* Recall & Precision ignore the number of lines of code (LOC) in the files being flagged as defective.
* When comparing different cache update policies or different prediction models that select different numbers of files
(and varying amounts of code) for inspection, we adopt a cost-effectiveness measure or AUCEC.

###Experimental Framework
* Git
* Bugzilla (All severity level except enhancement)
* Revision
  * Bug-Fixing Revision
  * Bug-Introducing Revision
  
###Defect Density
* Based on Open Bugs
* Closed Bugs

### Dataset
* ![Data Sets](chapters/1/1.PNG){: .img-responsive }

### Experiment Steps
* Preprocessing:
  1. Identify All the bug-fixing revisions and chronologically order them.
  1. For each bug-fixing revisions, apply the SZZ technique to identify the revisions of the bug-introducing change
* FixCache:
  * Initial pre-fetch "prime" the cache with the largest files of a project
  * Repeat for each Bug-fixing Revision 
    1. Probe the cache to see if the file being fixed is in the cache
    1. if file exit in the cache score a hit
    1. if not, score a miss and following the following steps
      1. fetch that buggy file into the cache
      1. determined all the spatially related files (files that were modified frequently with the buggy file in question)
    1. fetch the recently changed/added files (files that were changed/added between two bug-fix revisions)
    1. evict old files in cache based on either Least Recently Used(LRU) or retain files with highest number of closed bugs

### Evaluation
* RQ1: What is the line coverage of FixCache?
 ![RQ1](chapters/1/2.PNG){: .img-responsive }
* RQ2a: Do cached files have higher defect density than files not in cache?
 ![RQ2a](chapters/1/4.PNG){: .img-responsive }
* RQ2b: Do the churned files in the cache have higher defect density than churned files not in the cache?
 ![RQ2b](chapters/1/3.PNG){: .img-responsive }
* RQ3: Do differnt souces of cache updates have different levels of influcence on cache performance?
 ![RQ3](chapters/1/5.PNG){: .img-responsive }
* RQ4a: Do spatial and churn locality update policies improve the cost-effectiveness of FixCache?
 ![RQ4a](chapters/1/6.PNG){: .img-responsive }
* RQ4b: Can we improve FixCache AUCEC_20 performance by using a different cache replacement policy?
* RQ5: When used for instpections, is FixCache doing better than a naive model that simply picks previously buggy files?
 ![RQ4a](chapters/1/7.PNG){: .img-responsive }

 
###Threads to Validity
1. Construct Validity: bias in bug reporting + bias in linking to git commits
1. Internal Validity: choice of evaluations
1. External validity: only 5 projects from different software domains are used, maybe hard to generalize.

###Discussion
1. How can we apply FixCache in the software development cycle?
1. Does this paper provide a good evaluation of FixCache?
1. Why not evaluate FixCache on line granularity? 
1. How to effectively test code given files with most defective density?

