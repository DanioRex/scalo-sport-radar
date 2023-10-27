## Requirements
I haven't seen any specific requirements related to php version or php unit version so i got newest of them.

## Tests
To run tests use:
```
make all_tests
```

## Implementations

### ScoreBoard
I choose to implement all 4 interfaces into one class named `ScoreBoard` because i could place `MatchCollection` in its constructor for ease of use.

### Models
Here i choose placing two methods per interface because i had concept like "all methods related to property" and then connected them into one big interface with static `create` method. 
For bigger model (or entities) i pass DTOs to those static methods but because `MatchModel` and `TeamModel` are very simple i just used interfaces and string property.
