---
title: Week 1
---

## Course Outline
* Regular Languages and their descriptors:
  * Finite automaton, nondeterministic finite automata, regular expressions
  * Algorithms to decide questions about regular languages, is it empty?
  * Closure Properties of regular languages.

* Context -free languages and their descriptors:
  * Context-free grammars, pushdown automaton.
  * Decision and closure properties

* Recursive and recursively enumerable languages
  * Turing machines, decidability of problems.
  * The limit of what can be computed.

* Intractable problems
  * problems that require exponential time.
  * NP-completeness and beyond.
  
## Finite Automaton
* The set of strings accepted by an automaton A is the language of A.
* Denoted L(A).
* Different sets of final states -> different languages.
* Example: As designed, L(Tennis) = strings that determine the winner.

## Deterministic Finite Automata
* Alphabets $\Sigma$: any finite set of symbols
* String $\Sigma^*$: a list of which each element is a member of alphabet $\Sigma$
* Language: is a subset of $\Sigma^*$ for some alphabet $\Sigma$
* A formalism for defining languages, consisting of:
  1. A finite set of states $Q$
  1. An input alphabet $\Sigma$
  1. A transition function $\delta$
  1. A start state $q_0$
  1. A set of final/accepting states $F \subseteq Q$

## Graph Representation of DFA's
* Nodes = States
* Arcs = transition function
* Arrow labeled "Start" to the start state
* Final States indicated by double circles

## Nondeterministic finite automata (NFA)
* String accepted by NFA needs to end up at least one accept state
* Transition Function:
  * $\delta(q,a) $ is a set of states
* NFA there is a DFA that accpets the same language
  * Proof is the subset construction
* Subset Construction
