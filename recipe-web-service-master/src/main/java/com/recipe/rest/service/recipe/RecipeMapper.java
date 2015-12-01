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
 * Created by WLao on 11/12/15.
 */
package com.recipe.rest.service.recipe;

import com.fasterxml.jackson.databind.MapperFeature;
import com.fasterxml.jackson.databind.ObjectMapper;
import com.recipe.rest.common.View;
import com.recipe.rest.common.enums.ServiceOperation;
import com.recipe.rest.common.enums.DifficultyEnum;
import com.recipe.rest.dao.rank.RankDAO;
import com.recipe.rest.dto.Recipe;
import com.recipe.rest.entity.RecipeDO;
import org.apache.commons.collections.CollectionUtils;
import org.springframework.beans.BeanUtils;
import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.stereotype.Component;

import java.util.ArrayList;
import java.util.Collections;
import java.util.Iterator;
import java.util.List;

@Component
public class RecipeMapper {

    @Autowired
    RankDAO rankDAO;

    public RecipeDO mapToDO(Recipe recipeDTO, ServiceOperation serviceOperation) {
        RecipeDO recipeDO = new RecipeDO();
        String[] ignoreProperties = { "difficulty", "totalVote"};
        BeanUtils.copyProperties(recipeDTO, recipeDO, ignoreProperties);
        if (recipeDTO.getDifficulty() != null)
            recipeDO.setDifficulty(mapToDifficultyId(recipeDTO.getDifficulty()));
        return recipeDO;
    }

    public Recipe mapToDTO(RecipeDO recipeDO, ServiceOperation serviceOperation) throws Exception {
        Recipe recipeDTO = new Recipe();
        String[] ignoreProperties = { "difficulty" };
//        BeanUtils.copyProperties(recipeDTO, recipeDO);
        BeanUtils.copyProperties(recipeDO, recipeDTO, ignoreProperties);
        if (recipeDO.getDifficulty() != null)
            recipeDTO.setDifficulty(mapToDifficultyName(recipeDO.getDifficulty()));

        recipeDTO.setTotalVote(rankDAO.findTotalRanksByRecipeId(recipeDO.getId()));
        return serializer(recipeDTO, serviceOperation);
    }

    public List<Recipe> mapToDTO(List<RecipeDO> recipeDOList, ServiceOperation serviceOperation) throws Exception {
        if (CollectionUtils.isEmpty(recipeDOList)) return Collections.emptyList();
        List<Recipe> userList = new ArrayList<Recipe>(recipeDOList.size());
        Iterator<RecipeDO> recipeDOListItr = recipeDOList.iterator();
        String[] ignoreProperties = { "difficulty" };
        while (recipeDOListItr.hasNext()) {
            RecipeDO recipeDO = recipeDOListItr.next();
            Recipe recipeDTO = new Recipe();
            BeanUtils.copyProperties(recipeDO, recipeDTO, ignoreProperties);
            if (recipeDO.getDifficulty() != null)
                recipeDTO.setDifficulty(mapToDifficultyName(recipeDO.getDifficulty()));

            recipeDTO.setTotalVote(rankDAO.findTotalRanksByRecipeId(recipeDO.getId()));
            recipeDTO = serializer(recipeDTO, serviceOperation);
            userList.add(recipeDTO);
        }
        return userList;
    }

    private Integer mapToDifficultyId(String difficultyName) {
        if (difficultyName.equalsIgnoreCase(DifficultyEnum.SUPER_EASY.getName())) {
            return DifficultyEnum.SUPER_EASY.getId();
        } else if (difficultyName.equalsIgnoreCase(DifficultyEnum.EASY.getName())) {
            return DifficultyEnum.EASY.getId();
        } else if (difficultyName.equalsIgnoreCase(DifficultyEnum.MEDIOCRE.getName())) {
            return DifficultyEnum.MEDIOCRE.getId();
        } else if (difficultyName.equalsIgnoreCase(DifficultyEnum.HARD.getName())) {
            return DifficultyEnum.HARD.getId();
        } else if (difficultyName.equalsIgnoreCase(DifficultyEnum.SUPER_HARD.getName())) {
            return DifficultyEnum.SUPER_HARD.getId();
        }
        return null;
    }

    private String mapToDifficultyName(int difficultyId) {
        if (difficultyId == DifficultyEnum.SUPER_EASY.getId()) {
            return DifficultyEnum.SUPER_EASY.getName();
        } else if (difficultyId == DifficultyEnum.EASY.getId()) {
            return DifficultyEnum.EASY.getName();
        } else if (difficultyId == DifficultyEnum.MEDIOCRE.getId()) {
            return DifficultyEnum.MEDIOCRE.getName();
        } else if (difficultyId == DifficultyEnum.HARD.getId()) {
            return DifficultyEnum.HARD.getName();
        } else if (difficultyId == DifficultyEnum.SUPER_HARD.getId()) {
            return DifficultyEnum.SUPER_HARD.getName();
        }
        return null;
    }

    private Recipe serializer(Recipe recipeDTO, ServiceOperation serviceOperation) throws Exception {
        ObjectMapper objectMapper = new ObjectMapper();
        objectMapper.disable(MapperFeature.DEFAULT_VIEW_INCLUSION);
        String strOutput;
        if (serviceOperation != null) {
            if (serviceOperation.equals(ServiceOperation.ADD))
                strOutput = objectMapper.writerWithView(View.PostResponse.class).writeValueAsString(recipeDTO);
            else if (serviceOperation.equals(ServiceOperation.GET))
                strOutput = objectMapper.writerWithView(View.GetResponse.class).writeValueAsString(recipeDTO);
            else
                strOutput = objectMapper.writeValueAsString(recipeDTO);
        } else {
            strOutput = objectMapper.writeValueAsString(recipeDTO);
        }
        Recipe newRecipeDTO = objectMapper.readValue(strOutput, recipeDTO.getClass());
        return newRecipeDTO;
    }
}
