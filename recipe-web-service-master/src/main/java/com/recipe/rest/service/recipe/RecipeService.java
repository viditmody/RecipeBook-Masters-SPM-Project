/*************************************************************************
 * Copyright (c) Metabiota Incorporated - All Rights Reserved
 * ------------------------------------------------------------------------
 * This material is proprietary to Metabiota Incorporated. The
 * intellectual and technical concepts contained herein are proprietary
 * to Metabiota Incorporated. Reproduction or distribution of this
 * material, in whole or in part, is strictly forbidden unless prior
 * written permission is obtained from Metabiota Incorporated.
 * ***********************************************************************
 * <p/>
 * Created by WLao on 11/11/15.
 */
package com.recipe.rest.service.recipe;

import com.recipe.rest.dto.Recipe;

import java.util.List;
import java.util.Map;

public interface RecipeService {

    public Recipe findById(Integer id) throws Exception;

    public Map<String, List<Recipe>> findAll() throws Exception;

    public Recipe add(Recipe recipeDTO) throws Exception;

    public void update(Integer id, Recipe recipeDTO) throws Exception;
}
