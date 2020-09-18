<?php namespace Modules\Categoria\Sidebar;

use Maatwebsite\Sidebar\Group;
use Maatwebsite\Sidebar\Item;
use Maatwebsite\Sidebar\Menu;
use Modules\Core\Contracts\Authentication;

class SidebarExtender implements \Maatwebsite\Sidebar\SidebarExtender
{
    /**
     * @var Authentication
     */
    protected $auth;

    /**
     * @param Authentication $auth
     *
     * @internal param Guard $guard
     */
    public function __construct(Authentication $auth)
    {
        $this->auth = $auth;
    }

    /**
     * @param Menu $menu
     *
     * @return Menu
     */
    public function extendWith(Menu $menu)
    {
        $menu->group(trans('core::sidebar.content'), function (Group $group) {
            // $group->item(trans('Categoria'), function (Item $item) {
            //     $item->icon('fa fa-copy');
            //     $item->weight(10);
            //     $item->authorize(
            //          /* append */
            //     );
            //     $item->item(trans('categoria::categorias.title.categorias'), function (Item $item) {
            //         $item->icon('fa fa-copy');
            //         $item->weight(0);
            //         $item->append('admin.categoria.categoria.create');
            //         $item->route('admin.categoria.categoria.index');
            //         $item->authorize(
            //             $this->auth->hasAccess('categoria.categorias.index')
            //         );
            //     });
            //     $item->item(trans('categoria::subcategorias.title.subcategorias'), function (Item $item) {
            //         $item->icon('fa fa-copy');
            //         $item->weight(0);
            //         $item->append('admin.categoria.subcategoria.create');
            //         $item->route('admin.categoria.subcategoria.index');
            //         $item->authorize(
            //             $this->auth->hasAccess('categoria.subcategorias.index')
            //         );
            //     });
            //     $item->item(trans('categoria::subsubcategorias.title.subsubcategorias'), function (Item $item) {
            //         $item->icon('fa fa-copy');
            //         $item->weight(0);
            //         $item->append('admin.categoria.subsubcategoria.create');
            //         $item->route('admin.categoria.subsubcategoria.index');
            //         $item->authorize(
            //             $this->auth->hasAccess('categoria.subsubcategorias.index')
            //         );
            //     });

            // });
            
        });

        return $menu;
    }
}
