## Repository Pattern

### Key Points

1. **Decouples Code (Dependency Inversion Principle)**  
   Controllers depend on *interfaces*, not concrete classes.  
   You can swap repository implementations (DB, API, cache) without changing controller logic.

2. **Improves Testability**  
   Easily mock or fake repositories in unit tests.  
   No need for a real database connection during testing.

3. **Enhances Maintainability & Flexibility**  
   Centralize data-access logic and keep controllers clean.  
   Change bindings in one place (service provider) to affect the whole app.

4. **Trade-off: Slightly More Boilerplate**  
   Requires an extra interface + service provider.  
   Best suited for medium/large projects or when multiple data sources exist.

Take a look at `UserController@index`
