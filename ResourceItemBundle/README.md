Resource item bundle

Бандл описания игровых сущностей.

# Usage:
Application/Contract/Facade/ResourceFacadeInterface
- Зависомость для облегченного использования бандла внутри кода

Application/Contract/Handler
- Конкретные хендлеры для использования внутри кода, требуют использования конкретных запросов
- __invoke(QueryInterface): CollectionInterface

Application/Contract/Query
- Запросы для хендлеров

Application/Contract/Command
- Команды для хендлеров

Ui\View\ResourceItemFindByNameLikeViewInterface
- Использование для UI (Контроллеры). Запрос по like по имени ресурса %name%.
- 